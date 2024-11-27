<?php
require '../connection/db_connection.php';

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($_SESSION['user'])) {

  header("Location: home.php");
  exit;
}

if ($data) {
    // Log the received data for debugging
    file_put_contents('debug.log', print_r($data, true)); // Write to a file for inspection

    // Proceed with database insertion
    $collection = $m->works->projectCollection;

    $project = [
        'projID' => $collection->countDocuments() + 1,
        'author' => $data['author'],
        'descript' => $data['descript'],
        'title' => $data['title'],
        'category' => $data['category'],
        'pubDate' => $data['pubDate'],
        'design' => json_encode($data['design']), // Save JSON design data as a string
    ];

    $result = $collection->insertOne($project);
    echo json_encode(['success' => $result->isAcknowledged()]);
} else {
    file_put_contents('debug.log', "No data received\n", FILE_APPEND); // Log the error
    echo json_encode(['success' => false, 'error' => 'No data received']);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Design Your Project</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"> <!-- Bootstrap -->
  <script src="../bootstrap/js/bootstrap.bundle.js"></script>
  <script src="https://unpkg.com/konva@9.3.16/konva.min.js"></script> <!-- Konva -->
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .sidebar, .properties-panel {
      height: 100vh;
      width: 250px;
      position: fixed;
      background-color: #f8f9fa;
      padding: 20px;
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }
    .sidebar {
      left: 0;
    }
    .properties-panel {
      right: 0;
    }
    .sidebar button {
      margin-bottom: 15px;
      width: 100%;
    }
    .konva-container {
      margin-left: 260px;
      margin-right: 260px;
      margin-top: 20px;
      border: 1px solid #ccc;
      width: calc(100% - 520px);
      height: 600px;
      position: relative;
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <h4>Tools</h4>
    <button id="add-rect" class="btn btn-primary">Add Rectangle</button>
    <button id="add-text" class="btn btn-primary">Add Text</button>
    <button id="add-line" class="btn btn-primary">Add Line</button>
    <hr>
    <label for="fill-color">Fill Color</label>
    <input type="color" id="fill-color" class="form-control">
    <label for="stroke-color" class="mt-3">Stroke Color</label>
    <input type="color" id="stroke-color" class="form-control">
    <button id="delete-shape" class="btn btn-danger mt-3">Delete Selected</button>
    <hr>
    <button id="save-project" class="btn btn-success">Create Project</button>
  </div>

  <div class="konva-container" id="konva-container"></div>

  <div class="properties-panel">
    <h4>Properties</h4>
    <div id="properties-content">
      <p>Select an object to edit properties</p>
    </div>
  </div>

  <script>
    // Konva setup
    const stage = new Konva.Stage({
      container: 'konva-container',
      width: 800,
      height: 600,
    });

    const layer = new Konva.Layer();
    stage.add(layer);

    let selectedShape;
    const transformer = new Konva.Transformer({
      rotateAnchorOffset: 20,
      enabledAnchors: ['top-left', 'top-right', 'bottom-left', 'bottom-right'],
    });
    layer.add(transformer);

    function updatePropertiesPanel(shape) {
      const propertiesPanel = document.getElementById('properties-content');
      if (!shape) {
        propertiesPanel.innerHTML = '<p>Select an object to edit properties</p>';
        return;
      }

      let propertiesHtml = `
        <label for="prop-width">Width</label>
        <input type="number" id="prop-width" class="form-control" value="${shape.width()}" />
        <label for="prop-height" class="mt-2">Height</label>
        <input type="number" id="prop-height" class="form-control" value="${shape.height()}" />
      `;

      if (shape instanceof Konva.Text) {
        propertiesHtml += `
          <label for="prop-text" class="mt-2">Text</label>
          <input type="text" id="prop-text" class="form-control" value="${shape.text()}" />
        `;
      }

      propertiesPanel.innerHTML = propertiesHtml;

      // Add event listeners
      document.getElementById('prop-width').addEventListener('input', (e) => {
        shape.width(parseFloat(e.target.value));
        layer.draw();
      });

      document.getElementById('prop-height').addEventListener('input', (e) => {
        shape.height(parseFloat(e.target.value));
        layer.draw();
      });

      if (shape instanceof Konva.Text) {
        document.getElementById('prop-text').addEventListener('input', (e) => {
          shape.text(e.target.value);
          layer.draw();
        });
      }
    }

    function addTransform(shape) {
      shape.on('click', () => {
        transformer.nodes([shape]);
        selectedShape = shape;
        updatePropertiesPanel(shape);
        layer.draw();
      });
      shape.on('dragend', () => enforceBounds(shape));
      shape.on('transformend', () => enforceBounds(shape));
      layer.draw();
    }

    function enforceBounds(shape) {
      const box = shape.getClientRect();
      if (box.x < 0) shape.x(shape.x() - box.x);
      if (box.y < 0) shape.y(shape.y() - box.y);
      if (box.x + box.width > stage.width())
        shape.x(shape.x() - (box.x + box.width - stage.width()));
      if (box.y + box.height > stage.height())
        shape.y(shape.y() - (box.y + box.height - stage.height()));
      layer.draw();
    }

    document.getElementById('add-rect').addEventListener('click', () => {
      const rect = new Konva.Rect({
        x: 50,
        y: 50,
        width: 100,
        height: 70,
        fill: 'gray',
        stroke: 'black',
        strokeWidth: 2,
        draggable: true,
      });
      layer.add(rect);
      addTransform(rect);
    });

    document.getElementById('add-text').addEventListener('click', () => {
      const text = new Konva.Text({
        x: 50,
        y: 50,
        text: 'Edit Me',
        fontSize: 20,
        fill: 'black',
        draggable: true,
      });
      layer.add(text);
      addTransform(text);
    });

    document.getElementById('add-line').addEventListener('click', () => {
      const line = new Konva.Line({
        points: [50, 50, 150, 50],
        stroke: 'blue',
        strokeWidth: 3,
        draggable: true,
      });
      layer.add(line);
      addTransform(line);
    });

    document.getElementById('delete-shape').addEventListener('click', () => {
      if (selectedShape) {
        selectedShape.destroy();
        transformer.detach();
        updatePropertiesPanel(null);
        layer.draw();
        selectedShape = null;
      }
    });

    document.getElementById('fill-color').addEventListener('input', (e) => {
      if (selectedShape) {
        selectedShape.fill(e.target.value);
        layer.draw();
      }
    });

    document.getElementById('stroke-color').addEventListener('input', (e) => {
      if (selectedShape) {
        selectedShape.stroke(e.target.value);
        layer.draw();
      }
    });

    document.getElementById('save-project').addEventListener('click', () => {
      const shapes = layer.getChildren().toArray().map((shape) => shape.toObject());
      const projectData = {
        title: 'My Project',
        category: 'Education',
        author: 'User123',
        descript: 'Project Description',
        pubDate: new Date().toISOString(),
        design: shapes,
      };

      fetch('saveProject.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(projectData),
      }).then((response) => response.json()).then((data) => {
        if (data.success) {
          alert('Project saved successfully!');
        } else {
          alert('Error saving project.');
        }
      });
    });

    layer.draw();
  </script>
</body>
</html>
