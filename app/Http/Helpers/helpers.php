
<?php 

    use Illuminate\Support\Facades\DB;

    function roleName($roleID)
    {
        $name = DB::table('roles')->where('id', $roleID)->first()->name;
        return $name;

    }