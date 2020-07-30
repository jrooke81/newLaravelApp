<!DOCTYPE html>
<html>
    <head>
        <title>List</title>
    </head>
    <body>
        <table border="1">
            <thead>
                <tr> ID </tr>
                <tr> Module Number </tr>
                <tr> Module Name </tr>
            </thead>
            <tbody>
                @foreach($modules as $module)
                <tr>
                    <td> {{$module->id}} </td>
                    <td> {{$module->module_number}} </td>
                    <td> {{$module->module_name}} </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>