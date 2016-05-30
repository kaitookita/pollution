<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post_model extends CI_Model{

	 // Register
    public function create_user($username, $email, $password) {

        $data = array(
            'username'   => $username,
            'email'      => $email,
            'password'   => $this->hash_password($password),
        );

        return $this->db->insert('users', $data);

    }

    /**
     * hash_password function.
     *
     * @access private
     * @param mixed $password
     * @return string|bool could be a string on success, or bool false on failure
     */
    private function hash_password($password) {

        return password_hash($password, PASSWORD_BCRYPT);

    }

    /**
     * verify_password_hash function.
     *
     * @access private
     * @param mixed $password
     * @param mixed $hash
     * @return bool
     */
    private function verify_password_hash($password, $hash) {

        return password_verify($password, $hash);

    }

    // Login
    /**
     * resolve_user_login function.
     *
     * @access public
     * @param mixed $username
     * @param mixed $password
     * @return bool true on success, false on failure
     */
    public function resolve_user_login($username, $password) {

        $this->db->select('password');
        $this->db->from('users');
        $this->db->where('username', $username);
        $hash = $this->db->get()->row('password');

        return $this->verify_password_hash($password, $hash);

    }

    /**
     * get_user_id_from_username function.
     *
     * @access public
     * @param mixed $username
     * @return int the user id
     */
    public function get_user_id_from_username($username) {

        $this->db->select('id');
        $this->db->from('users');
        $this->db->where('username', $username);

        return $this->db->get()->row('id');

    }

    /**
     * get_user function.
     *
     * @access public
     * @param mixed $user_id
     * @return object the user object
     */
    public function get_user($user_id) {

        $this->db->from('users');
        $this->db->where('id', $user_id);
        return $this->db->get()->row();

    }

    public function get_data()
    {
    	$getdata = $this->db->query("select * from mapuser where date(date) = curdate()");
    	return $getdata;

    }

    function get_data_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('mapuser');
        if ($query->num_rows() > 0)
        {
            $row = $query->row();
            $data = array(
                'id'       => $row->id,
                'lat'      => $row->lat,
                'lng'      => $row->lng,
                'vision'   => $row->vision,

                'smell'    => $row->smell,

                
            );
            return $data;
        }
        return FALSE;
    }

    function get_average($lat1,$lat2,$lng1,$lng2)
    {
        $temp = "SELECT avg(vision) as vision,avg(smell) as smell FROM mapuser WHERE lat BETWEEN ".$lat1." and ".$lat2." and lng BETWEEN ".$lng1." and ".$lng2." and date(date) = curdate() ";
        $query = $this->db->query($temp);
        foreach ($query->result() as $row)
        {
            $data[] = array(
                    'vision'    => $row->vision,

                    'smell'     => $row->smell,

                );

        }
        return $data;
    }

    /*function get_position()
    {
        $getdata = $this->db->query("SELECT
                                        ms.id,
                                        ms.station,
                                        map.LATITUDE,
                                        map.LONGTITUDE,
                                        ps.CO,
                                        ps.NO2,
                                        ps.O3,
                                        ps.SO2,
                                        ps.PM10
                                        FROM
                                        mapstation AS ms
                                        INNER JOIN map as map ON ms.id = map.PUID
                                        INNER JOIN polutionstation as ps ON ms.id = ps.ID
                                        WHERE ps.date_time BETWEEN'2016-03-23 23:00:00' AND '2016-03-23 23:37:59'
                                        GROUP BY ms.id
                                        ORDER BY ms.id ASC");
        return $getdata;
    }*/


    /*function get_position()
    {
        $getdata = $this->db->query("SELECT
                                        ms.id,
                                        ms.station,
                                        map.LATITUDE,
                                        map.LONGTITUDE,
                                        ps.CO,
                                        ps.NO2,
                                        ps.O3,
                                        ps.SO2,
                                        ps.PM10
                                        FROM
                                        mapstation AS ms
                                        INNER JOIN map as map ON ms.id = map.PUID
                                        INNER JOIN polutionstation as ps ON ms.id = ps.ID
                                        WHERE ps.date_time BETWEEN'2016-03-23 23:00:00' AND '2016-03-23 23:37:59'
                                        GROUP BY ms.id
                                        ORDER BY ms.id ASC");
        return $getdata;
    }*/


    function get_position()
    {
        $getdata = $this->db->query("SELECT
                                        ms.id,
                                        ms.station,
                                        map.LATITUDE,
                                        map.LONGTITUDE,
                                        ps.CO,
                                        ps.NO2,
                                        ps.O3,
                                        ps.SO2,
                                        ps.PM10
                                        FROM
                                        mapstation AS ms
                                        INNER JOIN map as map ON ms.id = map.PUID
                                        INNER JOIN polutionstation as ps ON ms.id = ps.ID
                                        WHERE ps.date = curdate()
                                        GROUP BY ms.id
                                        ORDER BY ms.id ASC");
        return $getdata;
    }

    // public function get_data_by_id($id)
    // {
    //     $this->db->where('id', $id);
    //     $query = $this->db->get('map');
    //     if ($query->num_rows() > 0)
    //     {        
    //         $row = $query->row();
    //         $data = array(
    //             'id'       => $row->id,
    //             'lat'      => $row->lat,
    //             'lng'      => $row->lng,
    //             'vision'   => $row->vision,
    //             'sky'      => $row->sky,
    //             'smell'    => $row->smell,
    //             'noise'    => $row->noise,
                
    //         );

    //         //return $data;

    //         $lat1 = $data['lat']+0.1;
    //         $lat2 = $data['lat']-0.1;
    //         $lng1 = $data['lng']+1;
    //         $lng2 = $data['lng']-1;
    //        // $temp = "lat :".$lat;
    //         //return $temp;


    //         $temp = "SELECT avg(vision) as vision,avg(sky) as sky,avg(smell) as smell,avg(noise) as noise FROM map WHERE lat BETWEEN ".$lat2." and ".$lat1." and lng BETWEEN ".$lng2." and ".$lng1;

    //          // return $temp;

    //         $query2 = $this->db->query($temp);
    //         return $query2;

    //          // if ($query2->num_rows() > 0)
    //          //    {
    //          //        foreach ($query2->result() as $row) {
                        
    //          //            $data2['avg'][] = array(
    //          //                'vision'    => $row['vision'],
    //          //                'sky'       => $row['sky'],
    //          //                'smell'     => $row['smell'],
    //          //                'noise'     => $row['noise']
    //          //            );
                        
    //          //        }
    //          //        //return $row;
    //          //        return $data2;
    //          //    }
                    
                
    //     }
    //     return FALSE;
    // }

    /* Insert Shared Data */
    function insert_sharedata($data)
     {
          $this->db->insert('mapuser',$data);
     }



    function get_station_by_id($id)
    {
        for($count=0;$count<7;$count++)
        {
        $eachDayTime = time()-($count*24*60*60);
        $eachDayString = date("Y-m-d",$eachDayTime);

        //var_dump($eachDayString);

        //list($year, $month, $day) = split('[-]', $eachDayString);
        //echo "Year: $year; Month: $month; Day: $day<br />\n";


        $temp = "SELECT id,station,co,no2,o3,so2,pm10,date
        from 

        (SELECT id,station
         FROM mapstation
         WHERE id='".$id."') station ,

        (SELECT round(avg(co),2) as co
        FROM (SELECT CO
        FROM polutionstation
        WHERE ID = '".$id."' and date='".$eachDayString."'
        ORDER BY date DESC,HR DESC
        LIMIT 8) coin8) co ,

        (SELECT round(avg(no2),2) as no2
        FROM (SELECT no2
        FROM polutionstation
        WHERE ID = '".$id."' and date='".$eachDayString."'
        ORDER BY date DESC,HR DESC
        LIMIT 1) no2in1) no2 ,

        (SELECT round(avg(o3),2) as o3
        FROM (SELECT O3
        FROM polutionstation
        WHERE ID = '".$id."' and date='".$eachDayString."'
        ORDER BY date DESC,HR DESC
        LIMIT 8) o3in8) o3 ,

        (SELECT round(avg(so2),2) as so2
        FROM (SELECT SO2
        FROM polutionstation
        WHERE ID = '".$id."' and date='".$eachDayString."'
        ORDER BY date DESC,HR DESC
        LIMIT 24) so2in24) so2 ,

        (SELECT round(avg(pm10),2) as pm10
        FROM (SELECT pm10
        FROM polutionstation
        WHERE ID = '".$id."' and date='".$eachDayString."'
        ORDER BY date DESC,HR DESC
        LIMIT 24) pm10in24) pm10 ,

        (SELECT distinct date
        FROM polutionstation
        WHERE date='".$eachDayString."') date";

        //echo "<br><br><br><br><br>";
        //var_dump($temp);
        $query = $this->db->query($temp);
        //var_dump($query);
        //echo "<br>";
            if ($query->num_rows() > 0)
            {
                foreach ($query->result() as $row)
                {
                    $data[$count] = array(
                            'id'        => $row->id,
                            'station'   => $row->station,
                            'co'        => $row->co,
                            'no2'       => $row->no2,
                            'o3'        => $row->o3,
                            'so2'       => $row->so2,
                            'pm10'      => $row->pm10,
                            'date'      => $row->date,
                        );

                }
                //var_dump($data);
                //return $data;
            }
           /* echo "<br><br><br><br><br>";
            echo "<br><br><br><br><br>";
            echo "<br><br><br><br><br>";*/
        /*$temp2 = "SELECT id, co, no2, o3, so2, pm10,date
        FROM polutionstation
        WHERE id = '".$id."' and date = '".$eachDayString."'
        ORDER BY DATE_TIME DESC
        LIMIT 1";

        $query2 = $this->db->query($temp2);

            if ($query2->num_rows() > 0)
            {
                foreach ($query2->result() as $row)
                {
                    $data2[$count] = array(
                        'coval'        => $row->co,
                        'no2val'       => $row->no2,
                        'o3val'        => $row->o3,
                        'so2val'       => $row->so2,
                        'pm10val'      => $row->pm10
                    );

                }
            }*/


        //var_dump($query2);
        //var_dump($temp2);
        //echo "<br>";
            

        }//end of for
        //var_dump($data);
        //echo "<br>";
        //var_dump($data2);
        //return FALSE;

        $result[0] = $data;
        //$result[1] = $data2;

        //var_dump($result);

        if(isset($result))
            {return $result;}
        else
            {return false;}
    }

}