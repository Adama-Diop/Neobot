<?php
// require_once PATH_ROOT . '/models/sql_connection.php';


// function set_robot($nom, $date_creation, $id_corps, $id_bras, $id_jambes, $id_client, $microphone, $reconnaissance_voc, $detection_bruit, $camera, $vision_3d, $reconnaissance_fac, $capt_distance, $capt_infrarouge, $lidar, $radar, $temperature, $humidite, $luminosite)
// {

//     open_connection();

//     $sql = "INSERT INTO Robots (nom, date_creation, id_corps, id_bras, id_jambes, id_client, microphone, reconnaissance_voc, detection_bruit, camera, vision_3d, reconnaissance_fac, capt_distance, capt_infrarouge, lidar, radar, temperature, humidite, luminosite) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
//     $stmt = mysqli_prepare($GLOBALS['connection'], $sql);

//     mysqli_stmt_bind_param($stmt, "siiiiiiiiiiiiiiiisi", $nom, $date_creation, $id_corps, $id_bras, $id_jambes, $id_client, $microphone, $reconnaissance_voc, $detection_bruit, $camera, $vision_3d, $reconnaissance_fac, $capt_distance, $capt_infrarouge, $lidar, $radar, $temperature, $humidite, $luminosite);

//     $result = mysqli_stmt_execute($stmt);

//     close_connection();
//     return $result;
// }

// function get_all_robots_by_client_id($id_client)
// {
//     open_connection();
//     $all_robots = [];


//     $sql = "SELECT r.nom,  r.date_creation, r.id_corps, r.id_bras, r.id_jambes, r.id_client, r.microphone, r.reconnaissance_voc, r.detection_bruit, r.camera, r.vision_3d, r.reconnaissance_fac, r.capt_distance, r.capt_infrarouge, r.lidar, r.radar, r.temperature, r.humidite, r.luminosite FROM Robots r WHERE r.id_client = ?";

//     $stmt = mysqli_prepare($GLOBALS['connection'], $sql);
//     mysqli_stmt_bind_param($stmt, "i", $id_client);

//     mysqli_stmt_execute($stmt);
//     $result = mysqli_stmt_get_result($stmt);

//     while ($row = mysqli_fetch_assoc($result)) {
//         $all_robots[] = $row;
//     }

//     close_connection();

//     return $all_robots;
// }
