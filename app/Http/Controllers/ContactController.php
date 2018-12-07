<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mautic\MauticApi;
use Mautic\Auth\ApiAuth;


class ContactController extends Controller
{

	public function index(){

		session_start();

		// ApiAuth->newAuth() will accept an array of Auth settings
		$settings = array(
		    'userName'   => 'user',             // Create a new user       
		    'password'   => 'user123'              // Make it a secure password
		);

		// Initiate the auth object specifying to use BasicAuth
		$initAuth = new ApiAuth();
		$auth = $initAuth->newAuth($settings, 'BasicAuth');
		$apiUrl     = "https://gsu.crmforschools.net";
		$api        = new MauticApi();
		$contactApi = $api->newApi("contacts", $auth, $apiUrl);
		$limit = 50;
		$orderBy = 'id';
		$contacts = $contactApi->getList('','',$limit, $orderBy);
		$contacts = array_slice($contacts, 1, count($contacts));
		$contacts = collect($contacts);
		$contacts = $contacts->first();
		$contact_lists = [];
		foreach($contacts as $key => $value){
			if($value['fields']['all']['firstname'] != null){	
				array_push($contact_lists, array(
					'id' => $value['id'],
					'name' => $value['fields']['all']['firstname'] . ' ' . $value['fields']['all']['lastname']
				));
			} else {
				//do nothing
			}
		}

		return view('/contacts', array(
			'contact_lists' => $contact_lists
		));		
	}

    public function show_contact($id){
    	session_start();

		// ApiAuth->newAuth() will accept an array of Auth settings
		$settings = array(
		    'userName'   => 'user',             // Create a new user       
		    'password'   => 'user123'              // Make it a secure password
		);

		// Initiate the auth object specifying to use BasicAuth
		$initAuth = new ApiAuth();
		$auth = $initAuth->newAuth($settings, 'BasicAuth');
		$apiUrl     = "https://gsu.crmforschools.net";
		$api        = new MauticApi();
		$contactApi = $api->newApi("contacts", $auth, $apiUrl);

		$limit = 50;
		$orderBy = 'id';

		$contacts = $contactApi->getList('','',$limit, $orderBy);
		$contacts = array_slice($contacts, 1, count($contacts));

		$contacts = collect($contacts);
		$contacts = $contacts->first();

		$contact_lists = [];

		foreach($contacts as $key => $value){
			if($value['fields']['all']['firstname'] != null){
				array_push($contact_lists, array(
					'ID' => $value['id'],
					'Title' => $value['fields']['all']['title'],
					'First Name' => $value['fields']['all']['firstname'],
					'Last Name' => $value['fields']['all']['lastname'],
					'Company' => $value['fields']['all']['company'],
					'Email' => $value['fields']['all']['email'],
					'Phone' => $value['fields']['all']['phone'],
					'Address' => $value['fields']['all']['address1']. $value['fields']['all']['address2'],
					'City' => $value['fields']['all']['city'],
					'State' => $value['fields']['all']['state'],
					'Zipcode' => $value['fields']['all']['zipcode'],
					'Country' => $value['fields']['all']['country'],
					'Fax' => $value['fields']['all']['fax'],
					'Website' => $value['fields']['all']['website'],
					'Comments' => $value['fields']['all']['comments'],
					'Channel' => $value['fields']['all']['channel'],
					'Facebook' => $value['fields']['all']['facebook'],
					'Foursqauare' => $value['fields']['all']['foursquare'],
					'Googleplus' => $value['fields']['all']['googleplus'],
					'Instagram' => $value['fields']['all']['instagram'],
					'Linkedin' => $value['fields']['all']['linkedin'],
					'Skype' => $value['fields']['all']['skype'],
					'Twitter' => $value['fields']['all']['twitter'],
					'Points' => $value['points'],
					'Last Active' => $value['lastActive']
				));
			} else {
				//do nothing
			}
		}

		foreach($contact_lists as $contact_list){
			if($contact_list['ID'] == $id){
				$contact = $contact_list;
			} else {
				//do nothing
			}
		}

		foreach($contact as $key => $value){
			if($value == null){
				unset($contact[$key]);
			}
		}

    	return view('/contacts/view', array(
    		'contact' => $contact
    	));
    }
}
