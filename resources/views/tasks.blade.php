<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>لوحة إدارة المهام</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
</head>
<body class="bg-light py-5">

<div class="container" style="max-width: 800px;">
    <h2 class="text-center mb-4">قائمة المهام</h2>

    <div class="card p-4 mb-4 shadow-sm">
        <form action="{{ route('tasks.store') }}" method="POST" class="d-flex gap-2">
            @csrf
            <input type="text" name="title" class="form-control" placeholder="أضف مهمة جديدة..." required>
            <button type="submit" class="btn btn-primary">إضافة</button>
        </form>
    </div>

    <div class="card shadow-sm">
        <ul class="list-group list-group-flush">
            @foreach($tasks as $task)
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                
                <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="d-flex flex-grow-1 me-3">
                    @csrf @method('PUT')
                    <input type="text" name="title" value="{{ $task->title }}" class="form-control me-2">
                    <button type="submit" class="btn btn-warning btn-sm">تعديل</button>
                </form>

                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                </form>
                
            </li>
            @endforeach
        </ul>
    </div>
</div>

</body>
</html>