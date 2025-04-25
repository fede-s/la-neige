<?php

global $post;

$fields = get_fields($post);

echo Utils::getSeasonField($fields, 'some_field');
