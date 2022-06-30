# Adani_OsTicket
Prerequisite for osticket installation
-OSTicket v 1.15.2
-PHP 7.2.34 [Php 7.3+ will not be supported (eg. the export functionality willl break]
-Mysql 5.5+

Created a Superadmin account 
login using those credentinals
Customized OSTicket as per Annexure provided 

Changes made are as follows-

* Added department, modules, initialled default ticket priority as "Normal" and status as "Assigned", SLA details added.

* Priority changes made in ost_ticket_priority table in database.

* Email setting done (email: org.appsupp0rt@gmail.com (2FA was enabled thus used app password as login password details under Agent Panel --> Emails --> Emails)).

* Fetching Email via IMAP or POP (Enabled) - Fetch emails from a remote IMAP or POP mail box and convert them to tickets in your help desk.

* Sending Email via SMTP (Enabled) - Email sent using SMTP Server will increase the likelyhood of email delivery and will make the emails less likely to be marked as spam.

* * Added Auto-Assignment to Agent Only[which belongs to the concerned Department] via cron-job or Task Scheduler

* Added Ability of Ticket Close[Close State not Close status] and Reopening to Helpdesk User

* Fixed the transfer of Department when assigning a ticket to another agent of not same Department.

* Edited class.ticket.php (function assign()) for making Auto-Change-Department work when assigning to agent of different department

		error_log(print_r("Performing Transfer of Department", TRUE));
        if($assignee instanceof Staff && $this->getDeptId() !== $assignee->getDeptId())
            {   
                error_log(print_r("Inside if statement", TRUE));
                $form = new TransferForm();        
                $form->_dept = $assignee->getDept();
                $this->getThread()->addNote(array('note' => 'Ticket transferred as assigned staff in different department.'));                
                $this->transfer($form,$errors,false);
            }
* Edited tickets.php for updating resolution status by client/helpdesk user

* Edited /osticket/include/client/view.inc.php for enabling user to Reopen/Close Ticket.

* Edited scp/tickets.php for changing SLA based on Status change. [Add after Reply Successfully posted thing]

				 ///////////////////////////Code for modifying SLA based on status change/////////////////////////////////////////////////
                
                $conOst = new PDO($type.':host='.$host.';dbname='.$dname,$user,$pass);
                $sla_query=null;
                //error_log(print_r($ticket,TRUE));
                //error_log(print_r("The reply status id -".$vars['reply_status_id'],TRUE));
                $dept_name=null;
                $extract_dept="SELECT department FROM ost_user__cdata WHERE user_id=".(int)$ticket->getUserId();
                $extract_dept = $conOst->prepare($extract_dept);
                $extract_dept->execute();
                if($rss = $extract_dept->fetch())
                        $dept_name=$rss['department'];

                $dept_spec_sla="SELECT COUNT(*) FROM ost_sla WHERE NAME LIKE '".$dept_name."%'";
                $dept_spec_sla = $conOst->prepare($dept_spec_sla);
                $dept_spec_sla->execute();
                $count_val=$dept_spec_sla->fetchColumn();

                if($count_val<1)
                {
                switch((int)$vars['reply_status_id'])
                    {
                    case 6:    
                    case 2:
                        if(($ticket->getSLAId()!=2)||($ticket->getSLAId()!=5))
                        {
                            $priority_for_ticket=$ticket->getPriorityId();
                        if($priority_for_ticket==2)
                            { if($ticket->getSLAId()!=5)
                                    {
                                        $sla_query="UPDATE ost_ticket SET sla_id=5 WHERE ticket_id=:ticketid";
                                        $ticket->setSLAId(5);
                                    }
                            }
                        else 
                            { if($ticket->getSLAId()!=2)
                                {
                                    $sla_query="UPDATE ost_ticket SET sla_id=2 WHERE ticket_id=:ticketid";
                                    $ticket->setSLAId(2);
                                }
                            }
                        
                        }
                        else
                            $sla_query=null;
                    break;
                    
                    default:
                        $sla_query=null;
            

* Edited /include/staff/ticket-view.inc.php for Removing Transfer Icon altogether [Line 109]

* Edited include/client/open.inc.php for making the Subdomain logic work [new file- fetch_subdomain.php]

* Edited include/staff/ticket-view.inc.php for removing Open status from dropdown list

* Edited include/client/tickets.inc.php  for printing Priority based on SLA plan on helpdesk user dashboard

* Edited assets\default\css\themes.css   #container to 940px

* 
