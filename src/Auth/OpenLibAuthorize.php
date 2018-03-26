<?php
namespace app\Auth;

use Cake\Auth\BaseAuthorize;
use Cake\Http\ServerRequest;

class OpenLibAuthorize extends BaseAuthorize
{
    public function authorize($user, ServerRequest $request)
    {
        $this->_user = $user;
        
        if ($this->userHasRole('ADMIN')) {
            return true;
        }
        
        switch ($request->getParam('controller')) {
            case 'Users':
                if($request->getParam('action') == 'logout') {
                    return true;
                }
                break;
            case 'Pages':
                if ($request->getParam('action') == 'display') {
                    return true;
                }
                break;
            default:
                if(!empty($user)) {
                    return true;
                }
                break;
        }
        return false;
    }

    protected function userHasRole ($role)
    {
        if (isset($this->_user['role']) && ($this->_user['role']['role_name'] == $role)) {
            return true;
        }
        return false;
    }
}