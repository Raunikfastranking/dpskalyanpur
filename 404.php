<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>404 - Page Not Found</title>

  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    @keyframes float {
      0% { transform: translateY(0); }
      50% { transform: translateY(-12px); }
      100% { transform: translateY(0); }
    }

    @keyframes pulse-glow {
      0% { text-shadow: 0 0 10px rgba(0, 75, 35, 0.5); }
      50% { text-shadow: 0 0 20px rgba(0, 75, 35, 0.9); }
      100% { text-shadow: 0 0 10px rgba(0, 75, 35, 0.5); }
    }

    .float {
      animation: float 4s ease-in-out infinite;
    }

    .glow {
      animation: pulse-glow 2.5s ease-in-out infinite;
    }

    .fade-in {
      animation: fadeIn 1.2s ease-out forwards;
      opacity: 0;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to   { opacity: 1; transform: translateY(0); }
    }
  </style>

</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen overflow-hidden">

  <div class="text-center px-8 fade-in">

    <!-- Animated 404 -->
    <h1 class="text-[140px] md:text-[180px] font-extrabold text-[#003618] glow float">
      404
    </h1>

    <h2 class="text-3xl md:text-4xl font-semibold mt-4 text-gray-800">
      Oops! Page Not Found
    </h2>

    <p class="text-gray-600 mt-3 max-w-xl mx-auto">
      The page you are looking for may have been moved, deleted, or never existed.
    </p>

    <!-- Button -->
    <a href="/"
      class="mt-8 inline-block bg-[#003618] text-white px-8 py-3 rounded-full text-lg shadow hover:scale-105 hover:shadow-xl transition-all duration-300 ease-out">
      Go Back Home
    </a>

    <!-- Subtle floating shapes -->
    <div class="pointer-events-none">
      <div class="absolute top-[20%] left-[15%] w-10 h-10 bg-[#003618]/10 rounded-full blur-sm animate-pulse"></div>
      <div class="absolute bottom-[20%] right-[15%] w-16 h-16 bg-[#003618]/10 rounded-full blur-md float"></div>
    </div>

  </div>

</body>
</html>
