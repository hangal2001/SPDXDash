<SPDX-License-Identifier: Apache-2.0>
<!--
Copyright 2014 University of Nebraska at Omaha (UNO)

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
-->
<?php 
    $spdxDocId = $_GET['doc_id'];
    $format    = $_GET['format'];
    $spdxName  = $_GET['doc_name'];
    
    $printFormat = "TAG";
    if($format == "RDF") {
        $printFormat = "RDF";
    }
    
    $commandLine = $commandLine = "/do_spdx/DoSPDX.py --print $printFormat --spdxDocId $spdxDocId";
    exec($commandLine,$result);
    
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$spdxName.spdx");
    header("Content-Type: application/octet-stream; ");
    header("Content-Transfer-Encoding: binary");
    foreach($result as $line) {
        echo $line;
    }
?>
