<?php
    // Include the database connection file
    require '../connection/db_connection.php';

    // You can now use the $m variable to interact with the database
	// $m
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editable Area with Box & Text</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link  rel="stylesheet" href="../design/dashedit.css">
</head>
    <body>

    <div class="container mt-5">
        <h1 class="text-center">Editable Area with Box & Text</h1>
        
        <div class="row mt-4">
        <div class="col-md-4">
            <h4>Controls</h4>
            
            <!-- Select Element Type (Box/Text) -->
            <div class="mb-3">
            <label for="elementType" class="form-label">Element Type</label>
            <select id="elementType" class="form-select">
                <option value="box">Box</option>
                <option value="text">Text</option>
            </select>
            </div>

            <!-- Color Pickers for Box/Text -->
            <div class="mb-3">
            <label for="colorPicker" class="form-label">Fill Color</label>
            <input type="color" id="colorPicker" class="form-control">
            </div>

            <div class="mb-3">
            <label for="strokeColorPicker" class="form-label">Stroke Color</label>
            <input type="color" id="strokeColorPicker" class="form-control">
            </div>

            <div class="mb-3">
            <label for="strokeWidth" class="form-label">Stroke Width</label>
            <input type="number" id="strokeWidth" class="form-control" min="1" max="10" value="1">
            </div>

            <!-- Size Controls -->
            <div class="mb-3">
            <label for="sizeControl" class="form-label">Size (px)</label>
            <input type="range" id="sizeControl" class="form-range" min="50" max="300" value="100">
            <span id="sizeValue">100</span>px
            </div>

            <!-- Text Size (only for Text Elements) -->
            <div class="mb-3" id="textSizeControl" style="display: none;">
            <label for="textSize" class="form-label">Text Size (px)</label>
            <input type="number" id="textSize" class="form-control" value="20" min="10" max="100">
            </div>

            <!-- Text Input (only for Text Elements) -->
            <div class="mb-3" id="textInput" style="display: none;">
            <label for="textContent" class="form-label">Text Content</label>
            <input type="text" id="textContent" class="form-control" placeholder="Enter text here">
            </div>

            <!-- Background Color (only for Text Elements) -->
            <div class="mb-3" id="bgColorControl" style="display: none;">
            <label for="bgColorPicker" class="form-label">Background Color</label>
            <input type="color" id="bgColorPicker" class="form-control">
            </div>

            <!-- Add Element Button -->
            <button class="btn btn-primary" id="addElementBtn">Add Element</button>
        </div>

        <div class="col-md-8">
            <h4>Editable Area</h4>
            <!-- Editable Area -->
            <div id="editableArea" class="border" style="position: relative; width: 100%; height: 400px;">
            <!-- Elements will be added here -->
            </div>
        </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../script/dashedit.js"></script>
    </body>
</html>
