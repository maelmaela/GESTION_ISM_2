<?php
class Validator {
    private array $errors=[];

    public function getErros(): array{
        return $this->errors;
    }

    public function isEmpty(string $key, string $value, string $sms):void{
        if (empty($value)) {
            $this->errors[$key]=$sms;
        }
    }

    public function isValid():bool{
        return empty($this->errors);
    }

    public function addError(string $key, string $sms): void{
        $this ->errors[$key]=$sms;
    }
}
?>