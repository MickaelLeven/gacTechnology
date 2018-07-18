<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Http\Requests\TicketRequest;
use Carbon\Carbon;
use App\Http\Requests\ImportTicketsRequest;
use DB;

class TicketController extends Controller {
    
    private $ticket;
    
    /**
     * Initialize
     * @param Ticket $ticket
     */
    public function __construct(Ticket $ticket) {
    
        $this->ticket = $ticket;
    }
        
    /**
     * Get tickets
     * @return Response
     */
    public function list() {
        
        // Get tickets
        $tickets = $this->ticket->paginate(25);
        
        // return an html response
        return view('ticket.list', array( 
           
            'tickets' => $tickets 
        ));
   }
   
  /**
    * Display Form to create a new ticket
    * 
    *  @return Response
    */
   public function createForm() {
       
       // Get disctint type of tickets
       $types_ticket = DB::table('tickets')->selectRaw('type')->distinct()->get();
       
       // return an html response
       return view('ticket.create', array('types_ticket' => $types_ticket));
   }
   
   /**
    * Create a new tickets
    * @param TicketRequests $request
    * @return Response
    */
   public function create(TicketRequest $request) {
      
      // Get data of request
      $data = $request->except(array('_token'));

      // Format date
      $data['date'] = Carbon::createFromFormat('d/m/Y', $data['date'])->format('Y-m-d');
         
      // Create ticket
      $ticket = $this->ticket->create($data);
      
      // Return an html reponse.
      if($ticket === null) {
          
          return redirect()->back()->withErrors('Une erreur est survenue lors de la création du ticket');
      }
      else {
          
          return redirect()->route('read-ticket', array('id' => $ticket->id));
      }
   }
   
   /**
    * Display Form to update an ticket
    * @param Integer $id
    * @return Response
    */
   public function updateForm($id) {
       
       // Get disctint type of tickets
       $types_ticket = DB::table('tickets')->selectRaw('type')->distinct()->get();
       
       // Get Ticket
       $ticket = $this->ticket->findOrFail($id);
       
       // Return an html response
       return view('ticket.update', array(
           
           'types_ticket' => $types_ticket,
           'ticket' => $ticket
       ));
   }
   
   /**
    * Update an tickets
    * @param Integer $id
    * @param TicketRequests $request
    * @return Response
    */
   public function update($id, TicketRequest $request) {
       
       // Update ticket
       $success = $this->ticket->where('id', '=', $id)->update($request->except(array('_token')));
   
       // Return an html reponse
       if($success === false) {
           
           return redirect()->back()->withErrors('Une erreur est survenue lors de l\'enregistrement du ticket');
       }
       else {
           
           return redirect()->route('read-ticket', array('id' => $id));
       }
   }
   
   /**
    * Delete an ticket
    * @param Integer $id
    * @return Response
    */
   public function delete($id) {
       
       // Delete ticket
       $success = $this->ticket->where('id', '=', $id)->delete();
       
       // Return an html response.
       if($success === false) {
           
           return redirect()->back()->withErrors('Une erreur est survenue lors de la mise à jour du ticket');
       }
       else {
           
           return redirect()->route('list-tickets');
       }
   }
   
   /**
    * Display Form to Import Tickets
    * @return Response
    */
   public function importForm() {
       
       return view('ticket.import');
   }
   
   /**
    * Import tickets
    * @param ImportTicketsRequest $request
    * @return Response
    */
   public function import(ImportTicketsRequest $request) {
       
       // Get File
       $file = $request->file('csv_file');
       $file->move(public_path().'/uploads/', $file->getClientOriginalName());
       
       $datas = array_map('str_getcsv', file(url('/').'/uploads/'.$file->getClientOriginalName()));
       $datas_ticket = array();
       $old_customer_id = null;
       
       foreach($datas as $index => $data) {
           
           if($index < 3) {
               continue;
           }
           
           $data = explode(';', $data[0]);
          
           // For respect max size ;) 
           if(!empty($old_customer_id) && $old_customer_id != $data[2]) {
               
               $this->ticket->insert($datas_ticket);
               $datas_ticket = array();
           }
           
           $data_ticket = array(
               'account_invoice' => $data[0],
               'invoice_id' => $data[1],
               'customer_id' => $data[2],
               'date' => Carbon::createFromFormat('d/m/Y', $data[3])->format('Y-m-d'),
               'time' => $data[4],
               'type' => utf8_encode($data[7]),
               'weight' => null,
               'weight_invoice' => null,
               'duration' => null,
               'duration_invoice' => null,
               'created_at' => Carbon::now()->format('Y-m-d h:i:s'),
               'updated_at' => Carbon::now()->format('Y-m-d h:i:s')
           );
           
           if(strpos($data[5], ':') !== false) {
               
               $data_ticket['weight'] = null;
               $data_ticket['weight_invoice'] = null;
               $data_ticket['duration'] = $data[5];
               $data_ticket['duration_invoice'] = $data[6];
           }
           elseif(strpos($data[5], '.') !== false) {
              
               $data_ticket['weight'] = $data[5];
               $data_ticket['weight_invoice'] = $data[6];
               $data_ticket['duration'] = null;
               $data_ticket['duration_invoice'] = null;
           }
           
           $datas_ticket[] = $data_ticket;
           $old_customer_id = $data[2];
       }
       
       $this->ticket->insert($datas_ticket);
       
       return redirect()->route('list-tickets');
   }
   
   /**
    * Display Statistics for data tickets
    * @return Response
    */
   public function statisticsData() {
    
       // Get customer
       $customers = DB::table('tickets')->selectRaw("distinct(customer_id) as id")->get();
   
       foreach($customers as $customer) {
           
           // Get top 10 of data
           $top = $this->ticket
                    ->where('customer_id', '=', $customer->id)
                    ->whereNotNull('weight_invoice')
                    ->whereNotBetween('time', array('08:00:00', '19:00:00'))
                    ->orderBy('weight_invoice', 'desc')
                    ->limit(10)
                    ->get();
           
           $customer->top = $top;
       }
       
       return view('ticket.statistics-sms', array('customers' => $customers));
   }
   
   /**
    * Display Statistics
    * @return Response
    */
   public function statistics() {
       
       $count_account = DB::table('tickets')->selectRaw("distinct(account_invoice)")->get()->count();
       $count_invoice = DB::table('tickets')->selectRaw("distinct(invoice_id)")->get()->count();
       $count_customer = DB::table('tickets')->selectRaw("distinct(customer_id)")->get()->count();
       $count_tickets = DB::table('tickets')->count();
       $count_tickets_sms = $this->ticket->where('type', 'like', '%sms%')->get()->count();
       $count_tickets_phone = $this->ticket->where('type', 'like', '%appel%')->get()->count();
       $count_tickets_data = $this->ticket->where('type', 'not like', '%appel%')->where('type', 'not like', '%sms%')->get()->count();
       $total_duration = DB::table('tickets')->selectRaw("SEC_TO_TIME(SUM(time_to_sec(duration))) as total")->where('date', '>=', '2012-02-15')->first();
       
       // return response
       return view('ticket.statistics', array(
           'count_account' => $count_account,
           'count_invoice' => $count_invoice,
           'count_customer' => $count_customer,
           'count_tickets' => $count_tickets,
           'count_tickets_sms' => $count_tickets_sms,
           'count_tickets_phone' => $count_tickets_phone,
           'count_tickets_data' => $count_tickets_data,
           'total_duration' => $total_duration,
       ));
   }
}