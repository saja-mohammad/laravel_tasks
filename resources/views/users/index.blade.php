<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>قائمة المستخدمين</title>
    <!-- هنا يمكنك إضافة ملفات CSS لتحسين الشكل -->
    <style>
        table { width: 80%; margin: 20px auto; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: center; }
    </style>
</head>
<body>

    <h1 style="text-align: center;">إدارة المستخدمين</h1>

    <table>
        <thead>
            <tr>
                <th>الاسم</th>
                <th>البريد</th>
                <th>إجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                        @csrf 
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('هل أنت متأكد؟')">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>