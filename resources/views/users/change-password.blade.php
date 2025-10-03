@extends('layouts.app')

@section('title', 'Cambiar Contraseña - Huerto Virtual')

@section('content')
<div class="max-w-md mx-auto space-y-6">
    <!-- Header -->
    <div class="bg-white shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <h1 class="text-2xl font-bold text-gray-900">Cambiar Contraseña</h1>
            <p class="mt-1 text-sm text-gray-600">
                Actualiza tu contraseña para mantener tu cuenta segura
            </p>
        </div>
    </div>

    <!-- Formulario de cambio de contraseña -->
    <form method="POST" action="{{ route('profile.password.update') }}" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="bg-white shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <div class="space-y-6">
                    <!-- Contraseña actual -->
                    <div>
                        <label for="current_password" class="block text-sm font-medium text-gray-700">
                            Contraseña actual
                        </label>
                        <div class="mt-1 relative">
                            <input type="password" name="current_password" id="current_password" required
                                   class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm @error('current_password') border-red-500 @enderror">
                            <button type="button" onclick="togglePassword('current_password')" 
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <i class="fas fa-eye text-gray-400 hover:text-gray-600" id="current_password_icon"></i>
                            </button>
                        </div>
                        @error('current_password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nueva contraseña -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">
                            Nueva contraseña
                        </label>
                        <div class="mt-1 relative">
                            <input type="password" name="password" id="password" required
                                   class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm @error('password') border-red-500 @enderror">
                            <button type="button" onclick="togglePassword('password')" 
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <i class="fas fa-eye text-gray-400 hover:text-gray-600" id="password_icon"></i>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <div class="mt-2">
                            <div class="text-sm text-gray-600">
                                <p>La contraseña debe tener al menos:</p>
                                <ul class="list-disc list-inside mt-1 space-y-1">
                                    <li>8 caracteres</li>
                                    <li>Una letra mayúscula</li>
                                    <li>Una letra minúscula</li>
                                    <li>Un número</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Confirmar nueva contraseña -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                            Confirmar nueva contraseña
                        </label>
                        <div class="mt-1 relative">
                            <input type="password" name="password_confirmation" id="password_confirmation" required
                                   class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                            <button type="button" onclick="togglePassword('password_confirmation')" 
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <i class="fas fa-eye text-gray-400 hover:text-gray-600" id="password_confirmation_icon"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Indicador de fortaleza de contraseña -->
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Fortaleza de la contraseña
                        </label>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div id="password-strength-bar" class="h-2 rounded-full transition-all duration-300" style="width: 0%"></div>
                        </div>
                        <p id="password-strength-text" class="text-sm text-gray-600 mt-1"></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Botones de acción -->
        <div class="bg-white shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <div class="flex justify-end space-x-3">
                    <a href="{{ route('profile') }}" 
                       class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <i class="fas fa-times mr-2"></i>
                        Cancelar
                    </a>
                    
                    <button type="submit" 
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <i class="fas fa-key mr-2"></i>
                        Cambiar Contraseña
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    // Toggle password visibility
    function togglePassword(fieldId) {
        const field = document.getElementById(fieldId);
        const icon = document.getElementById(fieldId + '_icon');
        
        if (field.type === 'password') {
            field.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            field.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }

    // Password strength indicator
    document.getElementById('password').addEventListener('input', function() {
        const password = this.value;
        const strengthBar = document.getElementById('password-strength-bar');
        const strengthText = document.getElementById('password-strength-text');
        
        let score = 0;
        let feedback = [];
        
        // Length check
        if (password.length >= 8) {
            score += 25;
        } else {
            feedback.push('Al menos 8 caracteres');
        }
        
        // Uppercase check
        if (/[A-Z]/.test(password)) {
            score += 25;
        } else {
            feedback.push('Una letra mayúscula');
        }
        
        // Lowercase check
        if (/[a-z]/.test(password)) {
            score += 25;
        } else {
            feedback.push('Una letra minúscula');
        }
        
        // Number check
        if (/\d/.test(password)) {
            score += 25;
        } else {
            feedback.push('Un número');
        }
        
        // Update strength bar
        strengthBar.style.width = score + '%';
        
        if (score === 0) {
            strengthBar.className = 'h-2 rounded-full transition-all duration-300 bg-gray-300';
            strengthText.textContent = '';
        } else if (score <= 25) {
            strengthBar.className = 'h-2 rounded-full transition-all duration-300 bg-red-500';
            strengthText.textContent = 'Muy débil';
            strengthText.className = 'text-sm text-red-600 mt-1';
        } else if (score <= 50) {
            strengthBar.className = 'h-2 rounded-full transition-all duration-300 bg-orange-500';
            strengthText.textContent = 'Débil';
            strengthText.className = 'text-sm text-orange-600 mt-1';
        } else if (score <= 75) {
            strengthBar.className = 'h-2 rounded-full transition-all duration-300 bg-yellow-500';
            strengthText.textContent = 'Buena';
            strengthText.className = 'text-sm text-yellow-600 mt-1';
        } else {
            strengthBar.className = 'h-2 rounded-full transition-all duration-300 bg-green-500';
            strengthText.textContent = 'Muy fuerte';
            strengthText.className = 'text-sm text-green-600 mt-1';
        }
        
        if (feedback.length > 0 && password.length > 0) {
            strengthText.textContent += ' - Falta: ' + feedback.join(', ');
        }
    });

    // Confirm password match
    document.getElementById('password_confirmation').addEventListener('input', function() {
        const password = document.getElementById('password').value;
        const confirmation = this.value;
        
        if (confirmation.length > 0) {
            if (password === confirmation) {
                this.classList.remove('border-red-500');
                this.classList.add('border-green-500');
            } else {
                this.classList.remove('border-green-500');
                this.classList.add('border-red-500');
            }
        } else {
            this.classList.remove('border-red-500', 'border-green-500');
        }
    });
</script>
@endsection
