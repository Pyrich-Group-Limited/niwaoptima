<?php

namespace Modules\Approval\Http\Enum;

enum ActionEnum: int
{
    case CREATE = 1;
    case APPROVE = 2;
    case MODIFY = 3;
    case RETURN = 4;
    case DECLINE = 5;
}
