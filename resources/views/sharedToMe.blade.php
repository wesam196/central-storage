<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>share files</title>
</head>
<body>
  
   

    <h1>here you can find files other shared to you</h1>

    
    

    <table>
    <tr>
            <th>file name</th>
            <th>sende to</th>
        
    </tr>
   
   
    @for($i = 0; $i < count($fileNames['fileNamesList']); $i++)
       
        <tr>   
       
       
        
        <th>   
        {{$fileNames['fileNamesList'][$i]}}
                   

            </th>
           
           
            
                   
              <th>
                
              {{$fileNames['fileNamesName'][$i]}}
            
            </th>
            


        </tr>
        @endfor
        
    </table>


</body>
</html>