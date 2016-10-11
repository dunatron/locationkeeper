<?php
/**
 * Created by PhpStorm.
 * User: heath
 * Date: 18/04/16
 * Time: 11:20 AM
 */

class Uat extends DataObject
{

    private static $db = array(
        'ServerAddress' => 'Varchar(100)',
        'SiteURL' => 'Text',
        'BackEndAddress' => 'Text',
        'BackEndUser' => 'Text',
        'BackEndPass' => 'Text',
        'HtaccessUser' => 'Text',
        'HtaccessPass' => 'Text'
    );

    private static $has_one = array(
        'ProjectPage' => 'ProjectPage'
    );

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab('Root.Main', new DropdownField(
            'ServerAddress',
            'Choose A Server',
            Server::get()->map('ID', 'NameAddress')->toArray(),
            null,
            true
        ), 'SiteURL');
        return $fields;
    }

    /**
     * Environment Summary
     */
    private static $summary_fields = array(
        'SiteURL' => 'SiteURL',
        'CWPCheck' => 'Is this CWP',
        'ServerSummary' => 'Server Name + Address',
    );

    public function getServerByID()
    {
        $server = DataObject::get_by_id('Server', $this->ServerAddress);
        return $server;
    }

    public function ServerSummary()
    {
        $server = $this->getServerByID();
        $fullName = $server->ServerFullName();
        return $fullName;
    }

    public function CWPCheck()
    {
        $server = $this->getServerByID();
        $isset = $server->isCWPEnvironment();
        return $isset;
    }

    public function GetServer()
    {
        $server = Server::get()->filter(array(
            'ID' => $this->ServerAddress
        ));
        return $server;
    }

    public function GetServerID()
    {
        $serverID = 0;
        $server = Server::get()->filter(array(
            'ID' => $this->ServerAddress
        ));
        foreach ($server as $s)
        {
            $serverID = $s->ID;
        }
        return $serverID;
    }

    public function MakeSSH()
    {
        $sshString = 'ssh ';
        $server = Server::get()->byID($this->GetServerID());
        foreach ($server as $s)
        {
            $sshString .= $s->DevSSHUser;
            $sshString .= '@';
            $sshString .= $s->ServerAddress;
            $sshString .= ' | ';
            $sshString .= $s->DevSSHPass;

        }
        return $sshString;
    }

    public function LaunchTerminal()
    {
//        $cmd = '/Applications/Utilities/Terminal.app';
//        exec($cmd);
        exec('osascript -e \'tell app "iTunes" to play\'');
        exec('osascript /Applications/iTunes.app');
    }


}
