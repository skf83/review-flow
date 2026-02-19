<?php

namespace app\handlers\auth\jwt\contracts;

interface JwtSubject {

    public function getJwtIdentifier();
}