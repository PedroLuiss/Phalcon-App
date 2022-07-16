<?php
namespace App\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;
// Validation
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Email;

class LoginForm extends Form
{
    public function initialize()
    {
        /**
         * Email Address
         */
        $email = new Text('email', [
            "class" => "form-control",
            // "required" => true,
            "placeholder" => "Ingresas un email"
        ]);

        // form email field validation
        $email->addValidators([
            new PresenceOf(['message' => 'El email es requerido']),
            new Email(['message' => 'El email es invalido']),
        ]);

        /**
         * Password
         */
        $password = new Password('password', [
            "class" => "form-control",
            // "required" => true,
            "placeholder" => "Password"
        ]);
        
        // password field validation
        $password->addValidators([
            new PresenceOf(['message' => 'El password es requerido']),
            new StringLength(['min' => 5, 'message' => 'El password debe contener minimo 5 caracteres.']),
        ]);

        /**
         * Submit Button
         */
        $submit = new Submit('submit', [
            "value" => "Acceder",
            "class" => "btn btn-primary w-100 p-2",
        ]);

        $this->add($email);
        $this->add($password);
        $this->add($submit);
    }
}