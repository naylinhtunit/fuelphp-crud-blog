<?php

class Model_Post extends Orm\Model
{
    protected static $_properties = array(
        'id',
        'title',
        'category',
        'tags',
        'body',
        'create_date',
    );
}