<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            
            <!-- Yahan se aapka naya feature shuru hota hai -->
            <div class="p-6 text-gray-900">
                <h3 class="text-xl font-bold mb-4">Manage Employee by ID</h3>
                
                <div class="flex items-center space-x-4">
                    <!-- ID Input Box -->
                    <input 
                        type="number" 
                        id="employee_id" 
                        placeholder="Enter Employee ID" 
                        class="border border-gray-300 p-2 rounded w-64"
                    >
                    
                    <!-- Edit Button -->
                    <button 
                        type="button" 
                        onclick="goToEdit()" 
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                    >
                        Edit
                    </button>
                    
                    <!-- Delete Form & Button -->
                    <form id="deleteByIdForm" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button 
                            type="button" 
                            onclick="confirmAndDelete()" 
                            class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600"
                        >
                            Delete
                        </button>
                    </form>
                </div>
            </div>
            <!-- Yahan tak -->

        </div>
    </div>
</div>

<!-- JavaScript taake ID utha kar Edit ya Delete wale route par bhej sake -->
<script>
    function goToEdit() {
        let id = document.getElementById('employee_id').value;
        if(id) {
            // Edit route par bhej dega
            window.location.href = "/employee/edit/" + id;
        } else {
            alert('Meherbani karke pehle Employee ki ID likhein!');
        }
    }

    function confirmAndDelete() {
        let id = document.getElementById('employee_id').value;
        if(id) {
            if(confirm('Kya aap waqai ID #' + id + ' wale employee ko delete karna chahte hain?')) {
                let form = document.getElementById('deleteByIdForm');
                form.action = "/employee/delete/" + id;
                form.submit();
            }
        } else {
            alert('Meherbani karke pehle Employee ki ID likhein!');
        }
    }
</script>