<!DOCTYPE html>
<html>
<head>
    <title>Students List</title>
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
    <h1>Students List</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Standard</th>
                <th>Seat Number</th>
                <th>Courses</th>
                <th>Phone Number</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($studenttable as $studenttable)
                <tr>
                    <td>{{ $studenttable->student_name }}</td>
                    <td>{{ $studenttable->student_standard }}</td>
                    <td>{{ $studenttable->student_seatnumber }}</td>
                    <td>{{ $studenttable->student_courses }}</td>
                    <td>{{ $studenttable->student_phonenumber }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
