<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;
use Redirect;

class OrganizationsController extends Controller
{
    //
    public function index(){
        $organization = Organization::find(1);
        $bar = "organizations";
    	return view('organizations.index',compact('organization','bar'));
    }

    public function update(Request $request,$id){
    	$organization = Organization::find($id);

        if ( $request->hasFile('image')) {

            $file = $request->file('image');
            $name = time().'-'.$file->getClientOriginalName();
            $file = $file->move('public/uploads/logo', $name);
            $input['file'] = '/public/uploads/logo'.$name;
            $organization->logo = $name;
        }
        
        $organization->name     = $request->name;
        $organization->email    = $request->email;
        $organization->address  = $request->address;
        $organization->phone    = $request->phone;

        $organization->update();

        return Redirect::to('organizations')->withFlashMessage('Organization successfully updated!');
    }

    public function settings(){
        $organization = Organization::find(1);
        $bar = "settings";
        return view('organizations.settings',compact('organization','bar'));
    }

    public function settingsupdate(Request $request,$id){
        $organization = Organization::find($id);
        
        $organization->reorder_level     = $request->reorder_level;
        $organization->pin               = $request->pin;
        $organization->vat_no            = $request->vat_no;
        $organization->kra_etr           = $request->vat_etr;
        $organization->vat               = $request->vat;
        $organization->serial_no         = $request->serial_no;

        $organization->update();

        return Redirect::to('settings')->withFlashMessage('Settings successfully updated!');
    }

}
