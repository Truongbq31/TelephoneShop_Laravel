<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AllRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        $rules = [];
        $currentAction = $this->route()->getActionMethod();
//        dd($currentAction);

        switch ($this->method()):
            case "POST":
                switch ($currentAction):
                    case "addProducts":
                        $rules = [
                            "name"=>"required",
                            "image"=>"required|image|mimes:jpeg,jpg,png|max:5120",
                            "price"=>"required|numeric|min:0",
                            "description"=>"required"
                        ];
                    break;
                    case "addCategories":
                        $rules = [
                            'name'=>'required|unique:categories'
                        ];
                        break;
                    case "addBanners":
                        $rules = [
                            'image'=>'required|image|mimes:jpe,png,jpg|max:5120',
                        ];
                        break;
                    case "editBanners":
                        $rules = [
                            'image'=>'image|mimes:jpe,png,jpg|max:5120',
                        ];
                        break;
                    case "addAttributes":
                        $rules = [
                            'name'=>'required|',
                            'value'=>'required',
                        ];
                        break;
                    case "editAttributes":
                        $rules = [
                            'name'=>'required',
                            'value'=>'required',
                        ];
                        break;
                    case "register":
                        $rules = [
                            'name'=>'required|string',
                            'email'=>'required|unique:users',
                            'password'=>'required|min:6',
                            'confirm_password'=>'required|min:6'
                        ];
                        break;
                    case "editUsers":
                        $rules = [
                            'name'=>'required|string',
                            'email'=>'required',
                            'new_password'=>'required|min:6',
                            'confirm_new_password'=>'required|min:6'
                        ];
                        break;
                    case "changePassword":
                        $rules = [
                            'new_pass'=>'required|min:6',
                            'con_new_pass'=>'required|min:6'
                        ];
                        break;
                endswitch;
            break;
        endswitch;
        return $rules;
    }
}
