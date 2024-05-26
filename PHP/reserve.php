<?php
// php/ben nderlidhjen me pjesen e ldhjes se databazes
include 'connect.php';

// Check if the request method is POST ku marrim emrin e serverit si obj dhe e barazojme me vleren POST ku do te marrim
//te dhenat si atribute
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Marrim te dhenat
    $emri = $_POST['emri'] ?? '';
    $mbiemri = $_POST['mbiemri'] ?? '';
    $phone = $_POST['phone'] ?? ''; 
    $persona = $_POST['persona'] ?? '';
    $email = $_POST['email'] ?? '';
    $date = $_POST['date'] ?? '';
    $time = $_POST['time'] ?? '';

    // cekojme nqs te dhenat te marra jane te plotesuar te gjitha pra nese ka vlera boshe per tu vendosur ne DB ne baze te DB se krijuar duke 
    //perfshire te gjitha atributete se bashku me constrains
    if (empty($emri) || empty($mbiemri) || empty($phone) || empty($persona) || empty($email) || empty($date) || empty($time)) {
        $response = [
            'success' => false,
            'message' => 'Please fill in all fields.'
        ];
    } else {
        // Ben futjen ne sistem me ane te SQL "insert into reservations" te dhenat
        $sql = "INSERT INTO reservations (emri, mbiemri, phone, persona, email, date, time) VALUES (?, ?, ?, ?, ?, ?, ?)";

        // Prepare statement
        $stmt = $connection->prepare($sql);

        if ($stmt) {
            // Rasti tjtr ku jane te plotesuara
            $stmt->bind_param("sssssss", $emri, $mbiemri, $phone, $persona, $email, $date, $time); 

            // NQS TE GJITHA JANE CORRECT TE DHENAT RUHEN DHE PRINTOHET MESAZHI
            if ($stmt->execute()) {
                $response = [
                    'success' => true,
                    'message' => 'Reservation successfully made!'
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Error: ' . $stmt->error
                ];
            }

            // Perfundimi
            $stmt->close();
            //Nqs lidhja eshte gabimi ndermjet SQL dhe php per live server
        } else {
            $response = [
                'success' => false,
                'message' => 'Error in preparing the statement.'
            ];
        }
    }
} else {
    $response = [
        'success' => false,
        'message' => 'Invalid request method.'
    ];
}

// Mbyllet lidhja
$connection->close();

// Send JSON response
echo json_encode($response);
?>
