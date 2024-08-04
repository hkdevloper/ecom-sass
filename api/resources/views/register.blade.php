<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Registration Wizard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .wizard-step {
            display: none;
        }
        .wizard-step.active {
            display: block;
        }
    </style>
</head>
<body class="antialiased text-gray-900 bg-gray-100">

    <div class="max-w-4xl mx-auto mt-10 bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-center mb-8">Store Registration</h1>

        <form id="registrationForm">
            <!-- Step 1: Basic Store Details -->
            <div class="wizard-step active">
                <h2 class="text-2xl font-semibold mb-4">Step 1: Basic Details</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="block font-bold mb-2">Store Name</label>
                        <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                    </div>
                    <div>
                        <label for="phone" class="block font-bold mb-2">Phone</label>
                        <input type="text" id="phone" name="phone" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                    </div>
                    <div>
                        <label for="email" class="block font-bold mb-2">Email</label>
                        <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                    </div>
                    <div>
                        <label for="logo" class="block font-bold mb-2">Logo</label>
                        <input type="file" id="logo" name="logo" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                    </div>
                    <div>
                        <label for="cover_image" class="block font-bold mb-2">Cover Image</label>
                        <input type="file" id="cover_image" name="cover_image" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                    </div>
                    <div>
                        <label for="description" class="block font-bold mb-2">Description</label>
                        <textarea id="description" name="description" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"></textarea>
                    </div>
                </div>
                <div class="text-right mt-4">
                    <button type="button" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg" onclick="nextStep()">Next</button>
                </div>
            </div>

            <!-- Step 2: Store Details -->
            <div class="wizard-step">
                <h2 class="text-2xl font-semibold mb-4">Step 2: Store Details</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="category_id" class="block font-bold mb-2">Category</label>
                        <select id="category_id" name="category_id" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                            <option value="1">Category 1</option>
                            <option value="2">Category 2</option>
                            <!-- Add other categories here -->
                        </select>
                    </div>
                    <div>
                        <label for="website" class="block font-bold mb-2">Website</label>
                        <input type="text" id="website" name="website" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                    </div>
                    <div>
                        <label for="working_days" class="block font-bold mb-2">Working Days</label>
                        <input type="text" id="working_days" name="working_days" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                    </div>
                    <div>
                        <label for="opening_time" class="block font-bold mb-2">Opening Time</label>
                        <input type="time" id="opening_time" name="opening_time" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                    </div>
                    <div>
                        <label for="closing_time" class="block font-bold mb-2">Closing Time</label>
                        <input type="time" id="closing_time" name="closing_time" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                    </div>
                </div>
                <div class="flex justify-between mt-4">
                    <button type="button" class="bg-gray-600 hover:bg-gray-700 text-white py-2 px-4 rounded-lg" onclick="prevStep()">Previous</button>
                    <button type="button" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg" onclick="nextStep()">Next</button>
                </div>
            </div>

            <!-- Step 3: Social Media -->
            <div class="wizard-step">
                <h2 class="text-2xl font-semibold mb-4">Step 3: Social Media</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="facebook" class="block font-bold mb-2">Facebook</label>
                        <input type="text" id="facebook" name="facebook" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                    </div>
                    <div>
                        <label for="twitter" class="block font-bold mb-2">Twitter</label>
                        <input type="text" id="twitter" name="twitter" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                    </div>
                    <div>
                        <label for="instagram" class="block font-bold mb-2">Instagram</label>
                        <input type="text" id="instagram" name="instagram" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                    </div>
                    <div>
                        <label for="linkedin" class="block font-bold mb-2">LinkedIn</label>
                        <input type="text" id="linkedin" name="linkedin" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                    </div>
                    <div>
                        <label for="youtube" class="block font-bold mb-2">YouTube</label>
                        <input type="text" id="youtube" name="youtube" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                    </div>
                </div>
                <div class="flex justify-between mt-4">
                    <button type="button" class="bg-gray-600 hover:bg-gray-700 text-white py-2 px-4 rounded-lg" onclick="prevStep()">Previous</button>
                    <button type="button" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg" onclick="nextStep()">Next</button>
                </div>
            </div>

            <!-- Step 4: Additional Information -->
            <div class="wizard-step">
                <h2 class="text-2xl font-semibold mb-4">Step 4: Additional Information</h2>
                <div id="additionalInfo" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="additional_key_1" class="block font-bold mb-2">Key</label>
                        <input type="text" id="additional_key_1" name="additional_key[]" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                    </div>
                    <div>
                        <label for="additional_value_1" class="block font-bold mb-2">Value</label>
                        <input type="text" id="additional_value_1" name="additional_value[]" class="w-full px-4 py-2 border rounded-lg focus focus focus">
</div>
</div>
<div class="text-right mt-4">
<button type="button" class="bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-lg" onclick="addAdditionalInfo()">Add More</button>
</div>
<div class="flex justify-between mt-4">
<button type="button" class="bg-gray-600 hover:bg-gray-700 text-white py-2 px-4 rounded-lg" onclick="prevStep()">Previous</button>
<button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg">Submit</button>
</div>
</div>
</form>
</div>

<script>
    let currentStep = 0;
    const steps = document.querySelectorAll('.wizard-step');

    function showStep(step) {
        steps.forEach((stepElement, index) => {
            stepElement.classList.toggle('active', index === step);
        });
    }

    function nextStep() {
        if (currentStep < steps.length - 1) {
            currentStep++;
            showStep(currentStep);
        }
    }

    function prevStep() {
        if (currentStep > 0) {
            currentStep--;
            showStep(currentStep);
        }
    }

    function addAdditionalInfo() {
        const additionalInfo = document.getElementById('additionalInfo');
        const count = additionalInfo.children.length / 3 + 1;

        const keyDiv = document.createElement('div');
        const valueDiv = document.createElement('div');
        const removeButtonDiv = document.createElement('div');

        keyDiv.innerHTML = `
            <label for="additional_key_${count}" class="block font-bold mb-2">Key</label>
            <input type="text" id="additional_key_${count}" name="additional_key[]" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
        `;

        valueDiv.innerHTML = `
            <label for="additional_value_${count}" class="block font-bold mb-2">Value</label>
            <input type="text" id="additional_value_${count}" name="additional_value[]" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
        `;

        removeButtonDiv.innerHTML = `
            <button type="button" class="bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-lg mt-6" onclick="removeAdditionalInfo(this)">Remove</button>
        `;

        additionalInfo.appendChild(keyDiv);
        additionalInfo.appendChild(valueDiv);
        additionalInfo.appendChild(removeButtonDiv);
    }

    function removeAdditionalInfo(button) {
        const additionalInfo = document.getElementById('additionalInfo');
        const index = Array.from(additionalInfo.children).indexOf(button.parentElement) / 3;

        additionalInfo.removeChild(additionalInfo.children[index * 3 + 2]);
        additionalInfo.removeChild(additionalInfo.children[index * 3 + 1]);
        additionalInfo.removeChild(additionalInfo.children[index * 3]);
    }
</script>
</body>
</html>
