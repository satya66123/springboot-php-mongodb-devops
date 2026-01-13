<?php
$api = getenv("API_BASE_URL") ?: "http://localhost:8083";

function api_get($url) {
  return json_decode(file_get_contents($url), true);
}

function api_post($url, $data) {
  $opts = [
    "http" => [
      "method" => "POST",
      "header" => "Content-Type: application/json\r\n",
      "content" => json_encode($data)
    ]
  ];
  return json_decode(file_get_contents($url, false, stream_context_create($opts)), true);
}

function api_delete($url) {
  $opts = [
    "http" => [
      "method" => "DELETE"
    ]
  ];
  return file_get_contents($url, false, stream_context_create($opts));
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = trim($_POST["name"] ?? "");
  $email = trim($_POST["email"] ?? "");
  $role = trim($_POST["role"] ?? "");

  if ($name !== "" && $email !== "") {
    api_post($api . "/api/employees", ["name" => $name, "email" => $email, "role" => $role]);
  }
  header("Location: /");
  exit;
}

if (isset($_GET["delete"])) {
  api_delete($api . "/api/employees/" . urlencode($_GET["delete"]));
  header("Location: /");
  exit;
}

$employees = api_get($api . "/api/employees") ?: [];
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>PHP UI - Employees (Spring Boot API + MongoDB)</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 30px; }
    .card { padding: 16px; border: 1px solid #ddd; border-radius: 10px; margin-bottom: 18px;}
    input { padding: 10px; margin: 6px 0; width: 320px; max-width: 100%; }
    button { padding: 10px 14px; cursor:pointer; }
    table { width: 100%; border-collapse: collapse; margin-top: 14px; }
    th, td { border: 1px solid #ddd; padding: 10px; }
    th { background: #f3f3f3; }
    .danger { color: #b00020; }
  </style>
</head>
<body>

<h2>PHP UI → Spring Boot API → MongoDB (DevOps Repo)</h2>

<div class="card">
  <h3>Add Employee</h3>
  <form method="post">
    <input name="name" placeholder="Name" required /><br/>
    <input name="email" placeholder="Email" required /><br/>
    <input name="role" placeholder="Role" /><br/>
    <button type="submit">Create</button>
  </form>
</div>

<div class="card">
  <h3>Employees</h3>
  <table>
    <tr>
      <th>ID</th><th>Name</th><th>Email</th><th>Role</th><th>Created</th><th>Action</th>
    </tr>
    <?php foreach ($employees as $e): ?>
      <tr>
        <td><?= htmlspecialchars($e["id"] ?? "") ?></td>
        <td><?= htmlspecialchars($e["name"] ?? "") ?></td>
        <td><?= htmlspecialchars($e["email"] ?? "") ?></td>
        <td><?= htmlspecialchars($e["role"] ?? "") ?></td>
        <td><?= htmlspecialchars($e["createdAt"] ?? "") ?></td>
        <td>
          <a class="danger" href="/?delete=<?= urlencode($e["id"]) ?>" onclick="return confirm('Delete employee?')">Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>

</body>
</html>
