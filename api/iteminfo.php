<?php

if(!RECLASSIC::checkAdmin()){
    header("Location: ?to=error");
} 

$title = 'ItemInfo';
if ($_SERVER["REQUEST_METHOD"] == "POST") {



    $itemInfo = $_FILES['iteminfo'];
    $fileContent = file_get_contents($itemInfo['tmp_name']);
    $fileContent = mb_convert_encoding($fileContent, 'UTF-8', 'ISO-8859-1');

    // Explode em linhas
    $array = explode("\n", $fileContent);
    $ca = count($array);

    $check = false; // True: execute query
    $checkingdesc = false;
    $desccomplete = false;
    $last_setid = 0;
    $desc = '';
    $setid = 0;
    $first = true;

        for($i=0; $i < $ca; $i++){
            // Item ID
            if (preg_match('/\[(\d+)\]/', $array[$i], $matches)) {
                if ($first) {
                    $setid = $matches[1];
                    $first = false;
                    continue;
                }
                if ($setid != $matches[1] && $checkingdesc) {
                    $itemid = $setid;
                    $desccomplete = true;
                    $check = true;
                }
                $setid = $matches[1];
            }

            // Description Inline type
            // identifiedDescriptionName = { "desc1", "desc2" },
            if (preg_match('/^identifiedDescriptionName[ ]=[ ]\{(.*)\},/', $array[$i], $matches)) {
                $tmp = trim($matches[1]);
                $tmp = substr($tmp, 0, strpos($tmp, "},"));
                $tmp = str_replace('\\"', '"', $tmp); 
                $str = preg_split('/(",|"$)/', $tmp);
                foreach ($str as $x => $de) {
                    $de = trim($de);
                    $p = strtok($de, '"'); 
                    $desc .= $p . "<br />";
                }
                $check = true;
                $desccomplete = true;
            }


            // identifiedDescriptionName = {
            //     "desc1",
            //     "desc2"
            // },
            if (!$desccomplete && preg_match('/([ \s]+|^)identifiedDescriptionName[ ]=[ ]\{[\r\n]*/', $array[$i])) {
                $checkingdesc = true;
            }
            if ($checkingdesc && preg_match('/"(.*)(",{0,1})[\r\n]*/', $array[$i], $matches)) {
                $tmp = trim($matches[1]);
                $tmp = str_replace('\\"', '"', $tmp);
                $desc .= $tmp;
                if ($matches[2] == '",')
                    $desc .= "<br />";
            }


            if ($check) {
                $newdesc = '';
                $hasColor = false;
                $p = strtok($desc, "^");
                while ($p) {
                    if (preg_match('/([\dA-Fa-f]{6})/', $p, $matches)) {
                        if ($hasColor)
                            $newdesc .= "</font>";
                        if ($matches[1] != '000000') {

                            if(strtoupper($matches[1]) == '0000CC' || strtoupper($matches[1]) == '0033CC' || strtoupper($matches[1]) == '000088' || strtoupper($matches[1]) == '0000EE') $matches[1] = '0000ff';
                            if(strtoupper($matches[1]) == '6A5ACD' || $matches[1] == 'A400CD') $matches[1] = 'FF4AFF';
                            if(strtoupper($matches[1]) == '3CB371') $matches[1] = '00ff00';
                            if(strtoupper($matches[1]) == '663399') $matches[1] = 'ce9dff';
                            if(strtoupper($matches[1]) == '777777') $matches[1] = '695b06';
                            if(strtoupper($matches[1]) == 'FF0000') $matches[1] = 'ff5e6e';
                            if(strtoupper($matches[1]) == '00688B') $matches[1] = '00ff00';
                            if(strtoupper($matches[1]) == 'FA4E09') $matches[1] = 'ffeb2b';
                            $newdesc .= "<font color='#".$matches[1]."'>";
                            $hasColor = true;
                        }
                        else
                            $hasColor = false;
                        $newdesc .= substr($p,6,strlen($p));
                    }
                    else
                        $newdesc .= $p;
                    $p = strtok("^");
                }
            if ($hasColor) {
                $newdesc .= "</font>";
            }

        $itemidValue = $checkingdesc ? $itemid : $setid;
        
        $stmt = $conn->prepare("SELECT * FROM `itemdesc` WHERE `itemid` = ?");
        $stmt->bind_param("i", $itemidValue);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $stmt->close();
            $stmt = $conn->prepare("UPDATE `itemdesc` SET `itemdesc` = ? WHERE `itemid` = ?");
            if (!$stmt) {
                echo "Error: " . $conn->error . "<br>";
                return;
            }
            $stmt->bind_param("si", $newdesc, $itemidValue);
        } else {
            $stmt->close();
            $stmt = $conn->prepare("INSERT INTO `itemdesc` (`itemid`, `itemdesc`) VALUES (?, ?)");
            if (!$stmt) {
                echo "Error: " . $conn->error . "<br>";
                return;
            }
            $stmt->bind_param("is", $itemidValue, $newdesc);
        }
        
        if (!$stmt->execute()) {
            echo "Error: " . $stmt->error . "<br>";
        }
        $stmt->close();

            $desc = '';
            $check = false;
            $checkingdesc = false;
            $desccomplete = false;
        }
    }
}
?>
