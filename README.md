# Adani_OsTicket
Prerequisite for osticket installation
-OSTicket v 1.15.2
-PHP 7.2.34 [Php 7.3+ will not be supported (eg. the export functionality willl break]
-Mysql 5.5+

Created a Superadmin account 
login using those credentinals
Customized OSTicket as per Annexure provided 
Changes made-
1. Added department, modules, initialled default ticket priority as "Normal" and status as "Assigned", SLA details added.
2. Priority changes made in ost_ticket_priority table in database.
3. Email setting done (email: org.appsupp0rt@gmail.com (2FA was enabled thus used app password as login password details under Agent Panel --> Emails --> Emails))
4. Fetching Email via IMAP or POP (Enabled) - Fetch emails from a remote IMAP or POP mail box and convert them to tickets in your help desk.
5. Sending Email via SMTP (Enabled) - Email sent using SMTP Server will increase the likelyhood of email delivery and will make the emails less likely to be marked as spam.
