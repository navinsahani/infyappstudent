<!DOCTYPE html>
<html>
<head>
    <title>Student Data</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Student Data</h1>
    <table>
        <tr>
            <th>ID</th>
            <td>{{ $studenttable->id }}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{ $studenttable->student_name }}</td>
        </tr>
        <tr>
            <th>Standard</th>
            <td>{{ $studenttable->student_standard }}</td>
        </tr>
        <tr>
            <th>Seat Number</th>
            <td>{{ $studenttable->student_seatnumber }}</td>
        </tr>
        <tr>
            <th>Courses</th>
            <td>{{ $studenttable->student_courses }}</td>
        </tr>
        <tr>
            <th>Phone Number</th>
            <td>{{ $studenttable->student_phonenumber }}</td>
        </tr>
    </table>
</body>
</html>
