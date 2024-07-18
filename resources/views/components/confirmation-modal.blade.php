<!-- resources/views/components/confirmation-modal.blade.php -->
<div id="confirmationModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="relative bg-white p-6 rounded-lg shadow-lg max-w-3xl w-full h-[40vh] flex flex-col items-center justify-center">
        <!-- Contenido del modal -->
        <div class="text-center">
            <h2 class="text-2xl font-semibold mb-4">¡Cita Confirmada!</h2>
            <p class="mb-4">Tu cita ha sido confirmada exitosamente. Gracias por confiar en Nosotros.</p>
            <button id="closeModal" class="bg-blue-500 text-white px-6 py-3 rounded hover:bg-blue-600">Cerrar</button>
        </div>
    </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if(session('success'))
            document.getElementById('confirmationModal').classList.remove('hidden');
        @endif

        document.getElementById('closeModal').addEventListener('click', function () {
            document.getElementById('confirmationModal').classList.add('hidden');
        });
    });
</script>
