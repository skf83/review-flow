<?php

use Respect\Validation\Validator as v;

/**
 * setting up : VALIDATION RULES
 */
/* -> on users */
v::with('app\\validations\\users\\domain\\');
v::with('app\\validations\\users\\email\\');
//v::with('app\\validations\\users\\initials\\');
v::with('app\\validations\\users\\password\\');
v::with('app\\validations\\users\\phone\\');