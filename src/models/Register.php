<?php 

class Register extends User { 

    public function validate() { 
        $errors = [];

        if (!$this->name) { 
            $errors['name'] = 'Favor preencher o nome'; 
        }
        if (!$this->email) { 
            $errors['email'] = 'E-Mail é um campo obrigatório';
        }
        if (!$this->password) { 
            $errors['password'] = 'Senha obrigatória';
        }

        if(count($errors) > 0) { 
            throw new ValidationException($errors);
        }
    }

    public function validateUser() { 
        $this->validate();
        $user = User::getOne(['email' => $this->email]);

        if($user) { 
            if($user->email || $user->name) { 
                throw new AppException('Usuário já existe');
            }
        }
    }


    public function checkLogin() { 
        $this->validate();
        $user = User::getOne(['email' => $this->email]);
        if ($user) { 
            if($user->end_date) {
                throw new AppException('Usuário está OFF da empresa');
            }

            if(password_verify($this->password, $user->password)) { 
                return $user;
            }
        }

        throw new AppException('Usuário e Senha Inválidos');

    }
}



?>