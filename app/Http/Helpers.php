<?php
if (!function_exists('attribute_validation')) {
    function attribute_validation()
    {
        $attributes = \App\Attribute::all();
        $validation = [];
        foreach ($attributes as $attribute) {
            $rule = [];
            if ($attribute->required) {
                $rule[] = "required";
            }
            if ($attribute->type == "float") {
                $rule[] = "numeric";
            } else if ($attribute->type == "checkbox") {
                $rule[] = "boolean";
            } else if ($attribute->type == "selection") {
                $rule[] = "string";
            } else if ($attribute->type == "video") {
                $rule[] = "file";
            } else {
                $rule[] = $attribute->type;
            }
            $validation[$attribute->name] = implode($rule, "|");
        }
        return $validation;
    }
}
if (!function_exists('merge_with_meta')) {
    function merge_meta($data)
    {
        $merged_data = clone $data;
        if (!$data instanceof Illuminate\Database\Eloquent\Collection) {
            $merged_data = [$merged_data];
        }
        foreach ($merged_data as $key => $row) {
            foreach ($row->meta as $meta_key => $meta_row) {
                $merged_data[$key]->{$meta_key} = $meta_row->value;
            }
            unset($merged_data[$key]->meta);
        }
        if (!$data instanceof Illuminate\Database\Eloquent\Collection) {
            return $merged_data[0];
        }
        return $merged_data;
    }
}
