@extends('layout')

@section('content')
<div style="max-width: 500px; margin: 50px auto; background: white; padding: 20px; border: 1px solid #ddd; border-radius: 8px;">
    
    <h2 style="text-align: center; font-weight: bold; margin-bottom: 20px;">Employee Management</h2>

    <!-- Quick Edit / Delete -->
    <div style="background: #f9f9f9; padding: 15px; margin-bottom: 20px; border-radius: 5px;">
        <label style="display: block; font-weight: bold; margin-bottom: 8px; font-size: 14px;">Existing Employee ID:</label>
        <div style="display: flex; gap: 10px;">
            <input type="number" id="quick_employee_id" placeholder="Enter ID (e.g. 1)" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            <button type="button" onclick="quickEdit()" style="background: #007bff; color: white; border: none; padding: 8px 12px; border-radius: 4px; cursor: pointer;">Edit</button>
            <button type="button" onclick="quickDelete()" style="background: #dc3545; color: white; border: none; padding: 8px 12px; border-radius: 4px; cursor: pointer;">Delete</button>
        </div>
    </div>

    <hr style="margin-bottom: 20px;">

    <!-- Save Form -->
    <form method="POST" action="{{ route('employees.store') }}">
        @csrf

        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" placeholder="Enter name">
            @error('name') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" placeholder="Enter email">
            @error('email') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">Message</label>
            <textarea name="message" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" placeholder="Enter message">{{ old('message') }}</textarea>
            @error('message') <span style="color: red; font-size: 12px;">{{ $message }}</span> @enderror
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center;">
            <button type="submit" style="background: #28a745; color: white; border: none; padding: 10px 20px; border-radius: 4px; font-weight: bold; cursor: pointer;">SAVE NEW EMPLOYEE</button>
            <a href="{{ route('employees.index') }}" style="color: #007bff; text-decoration: underline; font-size: 14px;">View Full List</a>
        </div>
    </form>

</div>

<!-- Hidden Delete Form -->
<form id="quickDeleteForm" method="POST" style="display:none;">
    @csrf
    @method('DELETE')
</form>

<script>
    function quickEdit() {
        let id = document.getElementById('quick_employee_id').value;
        if(id) { window.location.href = "/employee/edit/" + id; }
        else { alert('Pehle ID likhein!'); }
    }
    function quickDelete() {
        let id = document.getElementById('quick_employee_id').value;
        if(id) {
            if(confirm('Delete ID #' + id + '?')) {
                let form = document.getElementById('quickDeleteForm');
                form.action = "/employee/delete/" + id;
                form.submit();
            }
        } else { alert('Pehle ID likhein!'); }
    }
</script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success'))
    <script>
        Swal.fire({ title: "Success!", text: "{{ session('success') }}", icon: "success", timer: 3000, showConfirmButton: false });
    </script>
@endif

@endsection