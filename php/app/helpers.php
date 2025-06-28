<?php
function gravatar_url($email, $size =48)
{
    return sprintf("//www.gravatar.com/avatar/%s?s=%d&d=identicon", md5(strtolower(trim($email))), $size);
}

function gravatar_profile_url($email, $size = 48)
{
    return sprintf("//www.gravatar.com/%s?s=%d&d=identicon", md5(strtolower(trim($email))), $size);
}
