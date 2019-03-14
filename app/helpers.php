<?php

if (! function_exists('processFilter')) {
    function processFilter($filters)
    {
        $return = [];
        foreach ($filters as $key => $filter)
        {
            if (is_array($filter)) {
                if (is_null($filter[0])) {
                    $return[$key] = "<= $filter[1]";
                } elseif (is_null($filter[1])) {
                        $return[$key] = "> $filter[0]";
                } else {
                    $return[$key] = "$filter[0] - $filter[1]";
                }
            } else {
                $return[$key] = __($filter);
            }
        }
        
        return $return;
    }
}

if(! function_exists('filterPrice')) {
    function queryFilter($query, $key, $filters, $selected)
    {
        if (isset($filters[$selected]) && is_array($filters[$selected]))
        {
            $filter = $filters[$selected];
                if (is_null($filter[0])) {
                    $query->where($key, '<=', $filter[1]);
                } elseif (is_null($filter[1])) {
                    $query->where($key, '>', $filter[0]);
                } else {
                    $query->whereBetween($key, $filters);
                }
        }

        return $query;
    }
}

