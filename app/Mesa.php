<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
	var $socket;
    var $error;

  public function Monitor(){
   	    $username = 'monast';
        $secret = '102030Th@';

        $socket = @fsockopen("192.168.99.200", "5038", $errornum, $errorstr);

        $agents = array();
        $curr_agent = "";

        if (!$socket) {
            print "Couldn't open socket. Error #" . $errornum . ": " . $errorstr;
      return FALSE;
        }else{
            fputs($socket, "Action: Login\r\n");
              fputs($socket, "UserName: $username\r\n");
              fputs($socket, "Secret: $secret\r\n\r\n");
              fputs($socket, "Action: SIPpeers\r\n\r\n");
              fputs($socket, "Action: Logoff\r\n\r\n");

               while(!feof($socket)) {
                  $info = fscanf($socket, "%s\t%s\r\n");

                  switch($info[0]) {
                                case "ObjectName:":
                                  $curr_agent = $info[1];
                                  $agents[$curr_agent] = array();
                                  $agents[$curr_agent]['RAMAL'] = $info[1];
                                  break;
                                case "IPaddress:":
                                  $agents[$curr_agent]['IP'] = $info[1];
                                  break;

                                case "IPport:":
                                  $agents[$curr_agent]['IPPORT'] = $info[1];
                                  break;
                                case "Status:":
                                  $agents[$curr_agent]['status'] = $info[1];
                                  break;
                                
                                default:
                                  break;
                              }
                          }
                      }
                          return $agents;
	}
}
