<?php
    include('util/ip.php');
    
    //session_start();
    $usuario = "root";
    $password = "";
    $server = "localhost";
    $bd = "ldaphelper";
    
    //$_SESSION['conexion'] = mysql_connect($server,$usuario,$password) or die("Error en la conexion de la BD");
    
    $_SESSION['conexion'] = new mysqli($server, $usuario, $password, $bd);
    
    //mysql_select_db($bd,$_SESSION['conexion']);

    function UserAlreadyExists($toComp, $ldapLink)
    {
        $dn = "ou=usuarios,dc=soy,dc=eduar,dc=com";
        $filter="(cn=*)";
        $justthese = array("cn");
        
        $sr = ldap_search($ldapLink, $dn, $filter, $justthese);
        $entry = ldap_first_entry($ldapLink, $sr);
        
        $exits = false;
        
        do
        {
            $cn = ldap_get_values($ldapLink, $entry, "cn");
        
            if ($toComp === $cn[0])
            {
                $exits = true;
                break;
            }
            
        } while ($entry = ldap_next_entry($ldapLink, $entry));
        
        return $exits;
    }
    
    function RegisterAuditoriaAcceso($user, $access_type)
    {
        $session_type;
        switch($access_type)
        {
            case "V":
                $session_type = "I";
                break;
            case "F":
                $session_type = "I";
                break;
            case "-":
                $session_type = "C";
                break;
        }
        
        $ip = getIP();
        //$created_date = date("Y-m-d H:i:s");
        
        $query = "insert into auditoria_accesos(user_cn_id, tipo_sesion, tipo_acceso, tiempo_acceso, ip) "
                . "values('$user', '$session_type', '$access_type', CURRENT_TIMESTAMP(), '$ip')";
        
        mysqli_query($_SESSION['conexion'],$query);
    }
    
    function RegisterAuditoriaTransaccion($user, $table, $field, $type, $previous, $current)
    {        
        $ip = getIP();
        
        $query = "insert into auditoria_transacciones(user_cn_id, nombre_tabla, nombre_campo, tipo_transaccion, 
                tiempo_transaccion, valor_anterior, valor_actual, ip) "
                . "values('$user','$table','$field','$type',CURRENT_TIMESTAMP(),'$previous','$current','$ip')";
        
        mysqli_query($_SESSION['conexion'],$query);
    }
    
    function RegisterPasswordSecurity($user, $pass_hash)
    {
        $query = "insert into passwordsecurity(user_cn_id, lastest_change_pass, pass1_hash) "
                . "values('$user', CURRENT_TIMESTAMP(), '$pass_hash')";
        
        mysqli_query($_SESSION['conexion'],$query);
    }
    
    function UpdatePasswordSecurity($user, $new_pass_hash)
    {
        $passwords = "select pass1_hash,pass2_hash,pass3_hash,pass4_hash,pass5_hash,last_pass_index
                     from passwordsecurity where user_cn_id = '$user'";
        $result = mysqli_query($_SESSION['conexion'], $passwords);
        
        if ($data = mysqli_fetch_row($result)) 
        {
            $query;
            $index = $data[5];
        
            if ($data[1] == null)
            {
                $query = "UPDATE passwordsecurity SET lastest_change_pass = CURRENT_TIMESTAMP(), 
                        pass2_hash = '$new_pass_hash', last_pass_index = '$index' "
                        . "WHERE user_cn_id = '$user'";
            }
            elseif ($data[2] == null)
            {
                $query = "UPDATE passwordsecurity SET lastest_change_pass = CURRENT_TIMESTAMP(), 
                        pass3_hash = '$new_pass_hash', last_pass_index = '$index' "
                        . "WHERE user_cn_id = '$user'";
            }
            elseif ($data[3] == null)
            {
                $query = "UPDATE passwordsecurity SET lastest_change_pass = CURRENT_TIMESTAMP(), 
                        pass4_hash = '$new_pass_hash', last_pass_index = '$index' "
                        . "WHERE user_cn_id = '$user'";
            }
            elseif ($data[4] == null)
            {
                $query = "UPDATE passwordsecurity SET lastest_change_pass = CURRENT_TIMESTAMP(), 
                        pass5_hash = '$new_pass_hash', last_pass_index = '1' "
                        . "WHERE user_cn_id = '$user'";
            }
            else
            {
                $newIndex = $index++;
                switch($index)
                {
                    case 1:
                        $query = "UPDATE passwordsecurity SET lastest_change_pass = CURRENT_TIMESTAMP(), 
                            pass1_hash = '$new_pass_hash', last_pass_index = '$newIndex' "
                            . "WHERE user_cn_id = '$user'";
                        break;
                    case 2:
                        $query = "UPDATE passwordsecurity SET lastest_change_pass = CURRENT_TIMESTAMP(), 
                            pass2_hash = '$new_pass_hash', last_pass_index = '$newIndex' "
                            . "WHERE user_cn_id = '$user'";
                        break;
                    case 3:
                        $query = "UPDATE passwordsecurity SET lastest_change_pass = CURRENT_TIMESTAMP(), 
                            pass3_hash = '$new_pass_hash', last_pass_index = '$newIndex' "
                            . "WHERE user_cn_id = '$user'";
                        break;
                    case 4:
                        $query = "UPDATE passwordsecurity SET lastest_change_pass = CURRENT_TIMESTAMP(), 
                            pass4_hash = '$new_pass_hash', last_pass_index = '$newIndex' "
                            . "WHERE user_cn_id = '$user'";
                        break;
                    case 5:
                        $query = "UPDATE passwordsecurity SET lastest_change_pass = CURRENT_TIMESTAMP(), 
                            pass5_hash = '$new_pass_hash', last_pass_index = '1' "
                            . "WHERE user_cn_id = '$user'";
                        break;  
                }
            }
            
            mysqli_query($_SESSION['conexion'], $query);
        }
    }
    
    function RegisterUsuarioPrivilegio($user, $admin, $privilegio_id, $status, $action_type)
    {
        $query;
        
        $query = "insert into Autorizacion(authored_cn_id, result) "
                . "values('admin', 'A')";
                
        mysqli_query($_SESSION['conexion'],$query);
        
        $authored_id = mysql_insert_id($_SESSION['conexion']);
        
        $query = "insert into UsuarioPrivilegio(user_cn_id,admin_cn_id,autorizacion_id,privilegio_id, up_status, action_type) "
                . "values('$user','$admin','$authored_id','$privilegio_id','$status', '$action_type')";
        
        mysqli_query($_SESSION['conexion'],$query);
        
        $up_id = mysqli_insert_id($_SESSION['conexion']);
        
        RegisterAuditoriaPrivilegio($up_id, "A"); // asignado
    }
    
    function RegisterAuditoriaPrivilegio($up_id, $type)
    {
        $ip = getIP();
        
        $query = "insert into Auditoria_Privilegios(up_id, privilegio_type, privilegio_time, ip) "
                . "values('$up_id','$type',CURRENT_TIMESTAMP(),'$ip')";
    }
    
    function GetPrivilegios($user_cn_id)
    {
        $query = "select * into UP.admin_cn_id,A.authored_cn_id,A.result,P.reference,UP.up_status,UP.action_type "
                ."FROM UsuarioPrivilegio UP "
                ."LEFT JOIN Autorizacion A ON UP.autorizacion_id = A.a_id "
                ."LEFT JOIN Privilegios P ON UP.privilegio_id = P.p_id"
                ."WHERE UP.user_cn_id = '$user_cn_id'";
        
        $result = mysqli_query($_SESSION['conexion'],$query);
        
        echo $user_cn_id;
        
        echo
            "<table>"
            ."<tr><td>Codigo</td><td>Admin</td><td>Autorizado</td><td>Estado</td><td>Permiso</td><td>Estado</td><td>Permisos</td></tr>";
            while($datos=mysqli_fetch_row($result))    
            { 
                echo "<tr><td>$datos[0]</td><td>$datos[1]</td><td>$datos[2]</td><td>$datos[3]</td><td>$datos[4]</td><td>$datos[5]</td></tr>"; 
            }
            echo "</table>";
    }
?>
