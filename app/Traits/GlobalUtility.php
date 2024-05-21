<?php

namespace App\Traits;

Trait GlobalUtility {
    protected  $customExceptionErrors = [
        'generic' => 'Sorry, there was a problem with this page. Please contact your admin for help.',
    ];

    public function getExceptionError($exceptionName = 'generic') {
        return $this->customExceptionErrors[$exceptionName] ?: $this->customExceptionErrors['generic'];
    }
}