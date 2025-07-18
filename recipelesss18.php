<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indian Recipes for Teenagers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Roboto+Slab:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background:#e9ecef;
            color: #333;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            position: relative;
            z-index: 2;
        }

        header {
            text-align: center;
            padding: 30px 0 20px;
            color: #fff;
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        header h1 {
            font-family: 'Roboto Slab', serif;
            font-size: 3.2rem;
            margin-bottom: 10px;
            background: linear-gradient(to right, #ff512f, #f09819, #ff512f);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: inline-block;
            position: relative;
            padding-bottom: 15px;
        }

        header h1::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 4px;
            background: linear-gradient(to right, #ff512f, #f09819);
            border-radius: 2px;
        }

        header p {
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto;
            color: black;
            text-shadow: 0 1px 2px rgba(0,0,0,0.3);
        }

        .button-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 15px;
            margin: 25px 0;
        }

        .category-btn {
            background: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 12px;
            padding: 14px 25px;
            font-size: 1.1rem;
            font-weight: 600;
            color: #333;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 6px 15px rgba(0,0,0,0.15);
            display: flex;
            align-items: center;
            gap: 10px;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .category-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255,255,255,0.3), rgba(255,255,255,0));
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .category-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
            color: #fff;
        }

        .category-btn:hover::before {
            opacity: 1;
        }

        .category-btn i {
            font-size: 1.4rem;
            transition: all 0.3s ease;
        }

        .category-btn:hover i {
            transform: scale(1.2);
        }

        .breakfast-btn:hover { background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 100%); }
        .lunch-btn:hover { background: linear-gradient(135deg, #a1c4fd 0%, #c2e9fb 100%); }
        .snacks-btn:hover { background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%); }
        .dinner-btn:hover { background: linear-gradient(135deg, #d4fc79 0%, #96e6a1 100%); }

        .recipe-display {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
            margin-top: 20px;
            display: none;
            position: relative;
            overflow: hidden;
        }

        .recipe-display::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 8px;
            background: linear-gradient(to right, #ff512f, #f09819);
            border-radius: 4px 4px 0 0;
        }

        .recipe-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .recipe-title {
            font-family: 'Roboto Slab', serif;
            font-size: 2.3rem;
            color: #ff6b6b;
            flex: 1;
            text-shadow: 0 2px 3px rgba(0,0,0,0.1);
            position: relative;
            padding-bottom: 10px;
        }

        .recipe-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 80px;
            height: 4px;
            background: linear-gradient(to right, #ff512f, #f09819);
            border-radius: 2px;
        }

        .controls {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .control-btn {
            background: #4a69bd;
            color: white;
            border: none;
            border-radius: 30px;
            padding: 12px 25px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }

        .control-btn:hover {
            background: #1e3799;
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.3);
        }

        .timer-display {
            background: rgba(255,255,255,0.9);
            color: #ff512f;
            padding: 8px 15px;
            border-radius: 30px;
            font-weight: 600;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            display: none;
            min-width: 70px;
            text-align: center;
        }

        .recipe-content {
            display: flex;
            flex-direction: column;
            gap: 35px;
        }
        
        .recipe-top {
            display: flex;
            flex-wrap: wrap;
            gap: 35px;
        }
        
        .recipe-image-container {
            flex: 1;
            min-width: 300px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            height: 320px;
            position: relative;
        }
        
        .recipe-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .recipe-image-container:hover .recipe-image {
            transform: scale(1.05);
        }

        .recipe-details {
            flex: 2;
            min-width: 300px;
            display: flex;
            flex-direction: column;
            gap: 25px;
        }
        
        .lang-tabs-container {
            background: #e9ecef;
            padding: 12px;
            border-radius: 30px;
            margin-bottom: 15px;
            display: inline-block;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }

        .lang-tabs {
            display: flex;
            gap: 10px;
        }

        .lang-tab {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            padding: 10px 25px;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
            font-size: 1.1rem;
        }

        .lang-tab.active {
            background: #4a69bd;
            color: white;
            border-color: #4a69bd;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        /* NEW CARD STYLES */
        .recipe-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 15px;
        }
        
        .recipe-card {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        
        .recipe-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.15);
        }
        
        .recipe-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, #ff512f, #f09819);
        }
        
        .card-title {
            font-family: 'Roboto Slab', serif;
            font-size: 1.6rem;
            color: #1e3799;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #ff9a9e;
            display: inline-block;
        }
        
        .card-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        
        .lang-content {
            display: none;
        }

        .lang-content.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .ingredients-list, .steps-list {
            padding-left: 20px;
            margin-bottom: 15px;
        }

        .ingredients-list li, .steps-list li {
            margin-bottom: 12px;
            line-height: 1.7;
            position: relative;
            padding-left: 15px;
        }

        .ingredients-list li::before {
            content: '•';
            color: #ff6b6b;
            font-size: 1.5rem;
            position: absolute;
            left: -10px;
            top: -5px;
        }

        .steps-list li {
            counter-increment: step-counter;
            margin-bottom: 20px;
        }

        .steps-list li::before {
            content: counter(step-counter);
            background: #4a69bd;
            color: white;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            position: absolute;
            left: -30px;
            top: 0;
            font-size: 0.9rem;
        }

        .benefits-text {
            line-height: 1.8;
            background: #fff;
            padding: 18px;
            border-radius: 10px;
            border-left: 4px solid #4a69bd;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            flex-grow: 1;
        }

        footer {
            text-align: center;
            padding: 30px 0;
            color: #fff;
            margin-top: 40px;
            font-size: 1.1rem;
            text-shadow: 0 1px 2px rgba(0,0,0,0.3);
        }

        .hidden {
            display: none;
        }

        .difficulty-level {
            display: inline-block;
            background: #ff6b6b;
            color: white;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
            margin-left: 15px;
            vertical-align: middle;
        }
        
        .prep-time {
            display: flex;
            align-items: center;
            gap: 8px;
            background: #f8f9fa;
            padding: 8px 15px;
            border-radius: 30px;
            margin-top: 10px;
            font-weight: 500;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        
        .recipe-stats {
            display: flex;
            gap: 15px;
            margin-top: 15px;
        }
        
        .stat-box {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 15px;
            flex: 1;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        
        .stat-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: #ff6b6b;
            margin-bottom: 5px;
        }
        
        .stat-label {
            font-size: 0.9rem;
            color: #6c757d;
        }
        
        .category-label {
            position: absolute;
            top: 10px;
            right: 0px;
            background:#f77623;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 600;
            z-index: 2;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        
        /* Responsive design */
        @media (max-width: 768px) {
            .recipe-top {
                flex-direction: column;
            }
			.category-label {
            position: absolute;
            top: 20px;
            right: 20px;
            background:#f77623;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 600;
            z-index: 2;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
            
            .recipe-image-container {
                height: 250px;
            }
            
            .button-container {
                gap: 10px;
            }
            
            .category-btn {
                padding: 12px 20px;
                font-size: 1rem;
            }
            
            .recipe-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .controls {
                width: 100%;
                justify-content: space-between;
            }
            
            header h1 {
                font-size: 2.5rem;
            }
            
            .recipe-cards {
                grid-template-columns: 1fr;
            }
        }
		.label{
			background:#f77623;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 600;
            z-index: 2;
			width:10rem;
			margin-top:1rem;
			margin-left:1rem;
			text-align:center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);	
		}
		a{
			text-decoration:none;
		}
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1><i class="fas fa-utensils"></i> Indian Recipes for Teens</h1>
            <p>Discover delicious and easy-to-make recipes from every corner of India</p>
        </header>
        
        <div class="button-container">
            <button class="category-btn breakfast-btn" data-category="breakfast">
                <i class="fas fa-egg"></i> Breakfast
            </button>
            <button class="category-btn lunch-btn" data-category="lunch">
                <i class="fas fa-utensil-spoon"></i> Lunch
            </button>
            <button class="category-btn snacks-btn" data-category="snacks">
                <i class="fas fa-cookie-bite"></i> Snacks
            </button>
            <button class="category-btn dinner-btn" data-category="dinner">
                <i class="fas fa-moon"></i> Dinner
            </button>
        </div>
        
        <div class="recipe-display" id="recipeDisplay">
            <div class="category-label" id="categoryLabel">Breakfast</div>
            <div class="recipe-header">
                <h2 class="recipe-title" id="recipeTitle">Masala Dosa</h2>
                <div class="controls">
                    <button class="control-btn" id="randomBtn">
                        <i class="fas fa-random"></i> Random Recipe
                    </button>
                    <div class="timer-display" id="timerDisplay">5s</div>
                    <button class="control-btn" id="autoBtn">
                        <i class="fas fa-sync"></i> Auto Generate
                    </button>
                </div>
            </div>
            
            <div class="recipe-content">
                <div class="recipe-top">
                    <div class="recipe-image-container">
                        <img src="https://images.unsplash.com/photo-1630919554025-4c0a1a1a4f5e?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=600&w=800" class="recipe-image" id="recipeImage" alt="Masala Dosa">
                    </div>
                    
                    <div class="recipe-details">
                        <div class="lang-tabs-container">
                            <div class="lang-tabs">
                                <div class="lang-tab active" data-lang="en">English</div>
                                <div class="lang-tab" data-lang="hi">हिंदी</div>
                            </div>
                        </div>
                        
                        <div class="prep-time">
                            <i class="fas fa-clock"></i> Prep Time: 20 min | Cook Time: 15 min
                        </div>
                        
                        <div class="recipe-stats">
                            <div class="stat-box">
                                <div class="stat-value">4.8</div>
                                <div class="stat-label">Rating</div>
                            </div>
                            <div class="stat-box">
                                <div class="stat-value">2</div>
                                <div class="stat-label">Servings</div>
                            </div>
                            <div class="stat-box">
                                <div class="stat-value">320</div>
                                <div class="stat-label">Calories</div>
                            </div>
                        </div>
                        
                        <div class="lang-content active" id="content-en">
                            <div class="recipe-cards">
                                <div class="recipe-card">
                                    <h3 class="card-title">Ingredients</h3>
                                    <div class="card-content">
                                        <ul class="ingredients-list" id="ingredientsListEn"></ul>
                                    </div>
                                </div>
                                
                                <div class="recipe-card">
                                    <h3 class="card-title">Preparation Method</h3>
                                    <div class="card-content">
                                        <ol class="steps-list" id="stepsListEn"></ol>
                                    </div>
                                </div>
                                
                                <div class="recipe-card">
                                    <h3 class="card-title">Health Benefits</h3>
                                    <div class="card-content">
                                        <p class="benefits-text" id="benefitsTextEn"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="lang-content" id="content-hi">
                            <div class="recipe-cards">
                                <div class="recipe-card">
                                    <h3 class="card-title">सामग्री</h3>
                                    <div class="card-content">
                                        <ul class="ingredients-list" id="ingredientsListHi"></ul>
                                    </div>
                                </div>
                                
                                <div class="recipe-card">
                                    <h3 class="card-title">बनाने की विधि</h3>
                                    <div class="card-content">
                                        <ol class="steps-list" id="stepsListHi"></ol>
                                    </div>
                                </div>
                                
                                <div class="recipe-card">
                                    <h3 class="card-title">स्वास्थ्य लाभ</h3>
                                    <div class="card-content">
                                        <p class="benefits-text" id="benefitsTextHi"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <footer>
        <p>Made with ❤️ for Indian Teenagers | Enjoy delicious and healthy meals!</p>
    </footer>

    <script>
        // Recipe database with 10 recipes per category
        const recipes = {
            breakfast: [
                {
                    name: "Masala Dosa",
                    image: "img/masaladosa.jpg",
                    ingredients: {
                        en: [
                            "2 cups rice",
                            "1 cup urad dal",
                            "1/2 tsp fenugreek seeds",
                            "Salt to taste",
                            "Oil for cooking",
                            "4 potatoes, boiled and mashed",
                            "1 onion, finely chopped",
                            "2 green chilies, chopped",
                            "1 tsp mustard seeds",
                            "1/2 tsp turmeric powder",
                            "Few curry leaves",
                            "2 tbsp oil"
                        ],
                        hi: [
                            "2 कप चावल",
                            "1 कप उड़द दाल",
                            "1/2 चम्मच मेथी दाना",
                            "नमक स्वादानुसार",
                            "पकाने के लिए तेल",
                            "4 आलू, उबले और मसले हुए",
                            "1 प्याज, बारीक कटा हुआ",
                            "2 हरी मिर्च, कटी हुई",
                            "1 चम्मच राई के दाने",
                            "1/2 चम्मच हल्दी पाउडर",
                            "कुछ करी पत्ते",
                            "2 बड़े चम्मच तेल"
                        ]
                    },
                    steps: {
                        en: [
                            "Soak rice and dal separately for 6 hours with fenugreek seeds in dal",
                            "Grind to smooth batter, mix together and ferment overnight",
                            "For potato filling, heat oil and add mustard seeds",
                            "Add curry leaves, green chilies and onions",
                            "Add turmeric and mashed potatoes, mix well",
                            "Heat dosa pan, pour batter and spread thin",
                            "Drizzle oil, cook until crisp",
                            "Place potato filling and fold dosa"
                        ],
                        hi: [
                            "चावल और दाल को अलग-अलग 6 घंटे के लिए भिगोएं (दाल में मेथी दाना मिलाएं)",
                            "बारीक पीसकर बैटर बनाएं, मिलाएं और रात भर किण्वित होने दें",
                            "आलू की भरने के लिए, तेल गर्म करें और राई डालें",
                            "करी पत्ते, हरी मिर्च और प्याज डालें",
                            "हल्दी और मसले हुए आलू डालें, अच्छी तरह मिलाएं",
                            "डोसा पैन गर्म करें, बैटर डालकर फैलाएं",
                            "तेल डालें, कुरकुरा होने तक पकाएं",
                            "आलू की भरावन रखें और डोसा मोड़ें"
                        ]
                    },
                    benefits: {
                        en: "Dosa is a fermented food rich in probiotics, great for gut health. Rice provides carbohydrates for energy while lentils add protein. Potato filling adds potassium and fiber. This balanced breakfast keeps you full for hours.",
                        hi: "डोसा एक किण्वित भोजन है जो प्रोबायोटिक्स से भरपूर है और आंतों के स्वास्थ्य के लिए बहुत अच्छा है। चावल ऊर्जा के लिए कार्बोहाइड्रेट प्रदान करते हैं जबकि दाल प्रोटीन जोड़ती है। आलू की भरावन पोटेशियम और फाइबर जोड़ती है। यह संतुलित नाश्ता आपको घंटों तक भरा हुआ रखता है।"
                    }
                },
                {
                    name: "Poha",
                    image: "img/poha.jpg",
                    ingredients: {
                        en: [
                            "2 cups flattened rice (poha)",
                            "1 onion, finely chopped",
                            "1 potato, diced",
                            "1/2 cup peanuts",
                            "1 tsp mustard seeds",
                            "1 tsp turmeric powder",
                            "2 green chilies, chopped",
                            "8-10 curry leaves",
                            "2 tbsp oil",
                            "Salt to taste",
                            "Fresh coriander for garnish",
                            "Lemon wedges for serving"
                        ],
                        hi: [
                            "2 कप चपटे चावल (पोहा)",
                            "1 प्याज, बारीक कटा हुआ",
                            "1 आलू, कटा हुआ",
                            "1/2 कप मूंगफली",
                            "1 चम्मच राई के दाने",
                            "1 चम्मच हल्दी पाउडर",
                            "2 हरी मिर्च, कटी हुई",
                            "8-10 करी पत्ते",
                            "2 बड़े चम्मच तेल",
                            "नमक स्वादानुसार",
                            "ताजा धनिया गार्निश के लिए",
                            "सर्व करने के लिए नींबू के वेज"
                        ]
                    },
                    steps: {
                        en: [
                            "Rinse poha in water until soft. Drain and set aside.",
                            "Heat oil in a pan. Add mustard seeds and let them splutter.",
                            "Add peanuts and sauté until golden brown.",
                            "Add chopped onions, green chilies, and curry leaves. Sauté until onions turn translucent.",
                            "Add diced potatoes and cook until tender.",
                            "Add turmeric powder and salt. Mix well.",
                            "Add the soaked poha and mix gently. Cook for 3-4 minutes.",
                            "Garnish with fresh coriander and serve hot with lemon wedges."
                        ],
                        hi: [
                            "पोहे को पानी में धोकर नरम होने तक भिगोएं। निकालकर अलग रख दें।",
                            "एक पैन में तेल गर्म करें। राई डालें और चटकने दें।",
                            "मूंगफली डालें और सुनहरा होने तक भूनें।",
                            "कटा हुआ प्याज, हरी मिर्च और करी पत्ता डालें। प्याज के पारदर्शी होने तक भूनें।",
                            "कटा हुआ आलू डालें और नरम होने तक पकाएं।",
                            "हल्दी पाउडर और नमक डालें। अच्छी तरह मिलाएं।",
                            "भीगे हुए पोहे डालें और हल्के हाथों से मिलाएं। 3-4 मिनट तक पकाएं।",
                            "ताजा धनिया से गार्निश करें और नींबू के वेज के साथ गर्म परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Poha is light and easy to digest. It provides carbohydrates for energy, iron from flattened rice, and protein from peanuts. The vegetables add essential vitamins and minerals. It's a balanced breakfast that keeps you full for longer.",
                        hi: "पोहा हल्का और पचने में आसान होता है। यह ऊर्जा के लिए कार्बोहाइड्रेट, चपटे चावल से आयरन और मूंगफली से प्रोटीन प्रदान करता है। सब्जियां आवश्यक विटामिन और खनिज जोड़ती हैं। यह एक संतुलित नाश्ता है जो आपको लंबे समय तक भरा हुआ रखता है।"
                    }
                },
                {
                    name: "Idli with Sambar",
                    image: "img/idliwithsambhar.jpg",
                    ingredients: {
                        en: [
                            "2 cups idli batter",
                            "1 cup toor dal (split pigeon peas)",
                            "1 cup mixed vegetables (carrot, beans, pumpkin)",
                            "1 onion, chopped",
                            "2 tomatoes, chopped",
                            "2 tbsp sambar powder",
                            "1/2 tsp turmeric powder",
                            "1 tsp mustard seeds",
                            "2 dry red chilies",
                            "A pinch of asafoetida",
                            "2 tbsp oil",
                            "Salt to taste",
                            "Fresh coriander for garnish"
                        ],
                        hi: [
                            "2 कप इडली बैटर",
                            "1 कप तूर दाल",
                            "1 कप मिश्रित सब्जियां (गाजर, बीन्स, कद्दू)",
                            "1 प्याज, कटा हुआ",
                            "2 टमाटर, कटे हुए",
                            "2 बड़े चम्मच सांभर पाउडर",
                            "1/2 चम्मच हल्दी पाउडर",
                            "1 चम्मच राई के दाने",
                            "2 सूखी लाल मिर्च",
                            "एक चुटकी हींग",
                            "2 बड़े चम्मच तेल",
                            "नमक स्वादानुसार",
                            "ताजा धनिया गार्निश के लिए"
                        ]
                    },
                    steps: {
                        en: [
                            "Prepare idli batter as per instructions and steam idlis.",
                            "Pressure cook toor dal until soft.",
                            "In a pot, cook mixed vegetables until tender.",
                            "Add cooked dal, sambar powder, turmeric, and salt. Simmer for 10 minutes.",
                            "Heat oil in a small pan. Add mustard seeds, red chilies, and asafoetida. Let them splutter.",
                            "Add this tempering to the sambar. Garnish with coriander.",
                            "Serve hot idlis with sambar and coconut chutney."
                        ],
                        hi: [
                            "निर्देशानुसार इडली बैटर तैयार करें और इडली को भाप में पकाएं।",
                            "तूर दाल को नरम होने तक प्रेशर कुक करें।",
                            "एक बर्तन में मिश्रित सब्जियों को नरम होने तक पकाएं।",
                            "पकी हुई दाल, सांभर पाउडर, हल्दी और नमक डालें। 10 मिनट तक उबालें।",
                            "एक छोटे पैन में तेल गर्म करें। राई, लाल मिर्च और हींग डालें। चटकने दें।",
                            "यह तड़का सांभर में डालें। धनिया से गार्निश करें।",
                            "गर्म इडली को सांभर और नारियल चटनी के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Idli is a fermented food that's great for gut health. It's low in fat and calories, making it ideal for weight management. Sambar provides protein from lentils and vitamins from vegetables. This combination is a complete, nutritious meal.",
                        hi: "इडली एक किण्वित भोजन है जो आंतों के स्वास्थ्य के लिए बहुत अच्छा है। यह वसा और कैलोरी में कम है, जो इसे वजन प्रबंधन के लिए आदर्श बनाता है। सांभर दाल से प्रोटीन और सब्जियों से विटामिन प्रदान करता है। यह संयोजन एक संपूर्ण, पौष्टिक भोजन है।"
                    }
                },
                {
                    name: "Aloo Paratha",
                    image: "img/alooparatha.jpg",
                    ingredients: {
                        en: [
                            "2 cups whole wheat flour",
                            "4 medium potatoes, boiled and mashed",
                            "1 onion, finely chopped",
                            "2 green chilies, finely chopped",
                            "1 tsp cumin seeds",
                            "1/2 tsp turmeric powder",
                            "1 tsp garam masala",
                            "Salt to taste",
                            "Water as needed",
                            "Ghee or oil for cooking"
                        ],
                        hi: [
                            "2 कप गेहूं का आटा",
                            "4 मध्यम आलू, उबाले और मसले हुए",
                            "1 प्याज, बारीक कटा हुआ",
                            "2 हरी मिर्च, बारीक कटी हुई",
                            "1 चम्मच जीरा",
                            "1/2 चम्मच हल्दी पाउडर",
                            "1 चम्मच गरम मसाला",
                            "नमक स्वादानुसार",
                            "आवश्यकतानुसार पानी",
                            "घी या तेल पकाने के लिए"
                        ]
                    },
                    steps: {
                        en: [
                            "Mix flour, salt and water to make a soft dough. Cover and rest for 20 minutes.",
                            "Mix mashed potatoes, onion, green chilies, and spices to make filling.",
                            "Divide dough and filling into equal portions.",
                            "Roll a dough ball, place filling, seal and roll out carefully.",
                            "Cook on hot tawa with ghee until golden brown on both sides.",
                            "Serve hot with yogurt, pickle or butter."
                        ],
                        hi: [
                            "आटा, नमक और पानी मिलाकर नरम आटा गूंथें। ढककर 20 मिनट रख दें।",
                            "मैश किए हुए आलू, प्याज, हरी मिर्च और मसालों को मिलाकर भरावन तैयार करें।",
                            "आटे और भरावन को बराबर भागों में बांटें।",
                            "आटे की लोई बेलें, भरावन रखें, बंद करें और धीरे से बेलें।",
                            "गरम तवे पर घी डालकर दोनों तरफ सुनहरा होने तक पकाएं।",
                            "गर्मागर्म दही, अचार या मक्खन के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Aloo paratha provides carbohydrates for energy and potatoes are rich in vitamin C and potassium. Whole wheat adds fiber which aids digestion. This filling breakfast provides sustained energy throughout the morning.",
                        hi: "आलू पराठा ऊर्जा के लिए कार्बोहाइड्रेट प्रदान करता है और आलू विटामिन सी और पोटेशियम से भरपूर होते हैं। गेहूं फाइबर जोड़ता है जो पाचन में सहायता करता है। यह भरपूर नाश्ता पूरी सुबह सतत ऊर्जा प्रदान करता है।"
                    }
                },
                {
                    name: "Vegetable Upma",
                    image: "img/vegetableupma.jpg",
                    ingredients: {
                        en: [
                            "1 cup semolina (rava)",
                            "2 tbsp oil",
                            "1 tsp mustard seeds",
                            "1 tsp urad dal",
                            "1 onion, finely chopped",
                            "1 carrot, finely chopped",
                            "1/2 cup green peas",
                            "2 green chilies, slit",
                            "1 inch ginger, grated",
                            "8-10 curry leaves",
                            "1/4 tsp turmeric powder",
                            "Salt to taste",
                            "2.5 cups water",
                            "Fresh coriander for garnish",
                            "Lemon wedges for serving"
                        ],
                        hi: [
                            "1 कप सूजी (रवा)",
                            "2 बड़े चम्मच तेल",
                            "1 चम्मच राई के दाने",
                            "1 चम्मच उड़द दाल",
                            "1 प्याज, बारीक कटा हुआ",
                            "1 गाजर, बारीक कटी हुई",
                            "1/2 कप हरी मटर",
                            "2 हरी मिर्च, चीरी हुई",
                            "1 इंच अदरक, कद्दूकस किया हुआ",
                            "8-10 करी पत्ते",
                            "1/4 चम्मच हल्दी पाउडर",
                            "नमक स्वादानुसार",
                            "2.5 कप पानी",
                            "ताजा धनिया गार्निश के लिए",
                            "सर्व करने के लिए नींबू के वेज"
                        ]
                    },
                    steps: {
                        en: [
                            "Dry roast semolina in a pan until aromatic and light golden. Set aside.",
                            "Heat oil in the same pan. Add mustard seeds and urad dal. Let them splutter.",
                            "Add curry leaves, green chilies, and ginger. Sauté for 30 seconds.",
                            "Add onions and sauté until translucent.",
                            "Add carrots and peas. Cook for 2-3 minutes.",
                            "Add water, salt, and turmeric. Bring to a boil.",
                            "Slowly add roasted semolina, stirring continuously to avoid lumps.",
                            "Cover and cook on low heat for 5 minutes until water is absorbed.",
                            "Garnish with fresh coriander and serve with lemon wedges."
                        ],
                        hi: [
                            "एक पैन में सूजी को सुखा भूनें जब तक सुगंधित और हल्का सुनहरा न हो जाए। अलग रख दें।",
                            "उसी पैन में तेल गर्म करें। राई और उड़द दाल डालें। चटकने दें।",
                            "करी पत्ते, हरी मिर्च और अदरक डालें। 30 सेकंड तक भूनें।",
                            "प्याज डालें और पारदर्शी होने तक भूनें।",
                            "गाजर और मटर डालें। 2-3 मिनट तक पकाएं।",
                            "पानी, नमक और हल्दी डालें। उबाल लें।",
                            "धीरे-धीरे भुनी हुई सूजी डालें, लगातार चलाते हुए गांठें बनने से बचाएं।",
                            "ढककर धीमी आंच पर 5 मिनट तक पकाएं जब तक पानी अवशोषित न हो जाए।",
                            "ताजा धनिया से गार्निश करें और नींबू के वेज के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Upma is a light and easily digestible breakfast. Semolina provides complex carbohydrates for sustained energy. Vegetables add fiber, vitamins and minerals. This balanced meal helps maintain steady blood sugar levels.",
                        hi: "उपमा एक हल्का और आसानी से पचने वाला नाश्ता है। सूजी सतत ऊर्जा के लिए जटिल कार्बोहाइड्रेट प्रदान करती है। सब्जियां फाइबर, विटामिन और खनिज जोड़ती हैं। यह संतुलित भोजन स्थिर रक्त शर्करा के स्तर को बनाए रखने में मदद करता है।"
                    }
                },
                {
                    name: "Besan Cheela",
                    image: "img/besanchilla.jpg",
                    ingredients: {
                        en: [
                            "1 cup gram flour (besan)",
                            "1 onion, finely chopped",
                            "1 tomato, finely chopped",
                            "1 green chili, finely chopped",
                            "2 tbsp coriander leaves, chopped",
                            "1/2 tsp cumin seeds",
                            "1/4 tsp turmeric powder",
                            "1/4 tsp red chili powder",
                            "Salt to taste",
                            "Water as needed",
                            "Oil for cooking"
                        ],
                        hi: [
                            "1 कप बेसन",
                            "1 प्याज, बारीक कटा हुआ",
                            "1 टमाटर, बारीक कटा हुआ",
                            "1 हरी मिर्च, बारीक कटी हुई",
                            "2 बड़े चम्मच धनिया पत्ती, कटी हुई",
                            "1/2 चम्मच जीरा",
                            "1/4 चम्मच हल्दी पाउडर",
                            "1/4 चम्मच लाल मिर्च पाउडर",
                            "नमक स्वादानुसार",
                            "आवश्यकतानुसार पानी",
                            "पकाने के लिए तेल"
                        ]
                    },
                    steps: {
                        en: [
                            "In a bowl, mix gram flour with water to make a smooth batter.",
                            "Add all vegetables, spices, and salt. Mix well.",
                            "Heat a non-stick pan and grease with oil.",
                            "Pour a ladleful of batter and spread into a thin circle.",
                            "Drizzle oil around the edges and cook until golden brown.",
                            "Flip and cook the other side.",
                            "Serve hot with mint chutney or ketchup."
                        ],
                        hi: [
                            "एक कटोरे में बेसन को पानी के साथ चिकना घोल बना लें।",
                            "सभी सब्जियां, मसाले और नमक डालें। अच्छी तरह मिलाएं।",
                            "एक नॉन-स्टिक पैन गर्म करें और तेल लगाएं।",
                            "एक कलछुल घोल डालें और पतला गोल फैलाएं।",
                            "किनारों पर तेल डालें और सुनहरा होने तक पकाएं।",
                            "पलटें और दूसरी तरफ पकाएं।",
                            "गर्मागर्म पुदीने की चटनी या केचप के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Besan cheela is rich in protein from gram flour, which helps in muscle building and repair. It's gluten-free and low in calories, making it ideal for weight management. Vegetables add essential vitamins and fiber.",
                        hi: "बेसन चीला चने के आटे से प्रोटीन से भरपूर होता है, जो मांसपेशियों के निर्माण और मरम्मत में मदद करता है। यह ग्लूटेन-मुक्त और कैलोरी में कम है, जो इसे वजन प्रबंधन के लिए आदर्श बनाता है। सब्जियां आवश्यक विटामिन और फाइबर जोड़ती हैं।"
                    }
                },
                {
                    name: "Methi Thepla",
                    image: "img/methithepla.jpg",
                    ingredients: {
                        en: [
                            "2 cups whole wheat flour",
                            "1 cup fresh fenugreek leaves (methi), finely chopped",
                            "1/2 cup yogurt",
                            "1 green chili, finely chopped",
                            "1 tsp ginger paste",
                            "1 tsp turmeric powder",
                            "1 tsp red chili powder",
                            "1 tsp cumin seeds",
                            "1/2 tsp asafoetida",
                            "Salt to taste",
                            "Water as needed",
                            "Oil for cooking"
                        ],
                        hi: [
                            "2 कप गेहूं का आटा",
                            "1 कप ताजा मेथी के पत्ते, बारीक कटे हुए",
                            "1/2 कप दही",
                            "1 हरी मिर्च, बारीक कटी हुई",
                            "1 चम्मच अदरक पेस्ट",
                            "1 चम्मच हल्दी पाउडर",
                            "1 चम्मच लाल मिर्च पाउडर",
                            "1 चम्मच जीरा",
                            "1/2 चम्मच हींग",
                            "नमक स्वादानुसार",
                            "आवश्यकतानुसार पानी",
                            "पकाने के लिए तेल"
                        ]
                    },
                    steps: {
                        en: [
                            "In a large bowl, mix flour, fenugreek leaves, and all spices.",
                            "Add yogurt and mix well.",
                            "Add water gradually and knead into a soft dough.",
                            "Cover and rest for 15 minutes.",
                            "Divide dough into small balls.",
                            "Roll each ball into thin circles.",
                            "Heat a tawa and cook each thepla with oil until golden brown on both sides.",
                            "Serve hot with pickle or yogurt."
                        ],
                        hi: [
                            "एक बड़े कटोरे में आटा, मेथी के पत्ते और सभी मसाले मिलाएं।",
                            "दही डालें और अच्छी तरह मिलाएं।",
                            "धीरे-धीरे पानी डालें और नरम आटा गूंथ लें।",
                            "ढककर 15 मिनट के लिए रख दें।",
                            "आटे को छोटी-छोटी लोइयों में बांटें।",
                            "प्रत्येक लोई को पतले गोलों में बेलें।",
                            "तवा गर्म करें और प्रत्येक थेपला को तेल डालकर दोनों तरफ सुनहरा होने तक पकाएं।",
                            "गर्मागर्म अचार या दही के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Methi thepla is rich in iron and fiber from fenugreek leaves. The probiotics in yogurt aid digestion. Whole wheat provides complex carbohydrates for sustained energy. This nutritious breakfast is great for growing teenagers.",
                        hi: "मेथी थेपला मेथी के पत्तों से आयरन और फाइबर से भरपूर होता है। दही में प्रोबायोटिक्स पाचन में सहायता करते हैं। गेहूं सतत ऊर्जा के लिए जटिल कार्बोहाइड्रेट प्रदान करता है। यह पौष्टिक नाश्ता बढ़ते किशोरों के लिए बहुत अच्छा है।"
                    }
                },
                {
                    name: "Vegetable Sandwich",
                    image: "img/vegetablesandwich.jpg",
                    ingredients: {
                        en: [
                            "8 bread slices",
                            "1 cucumber, thinly sliced",
                            "1 tomato, thinly sliced",
                            "1 onion, thinly sliced",
                            "1 boiled potato, thinly sliced",
                            "1/2 cup grated carrots",
                            "1/4 cup chopped bell peppers",
                            "1/4 cup butter",
                            "2 tbsp green chutney",
                            "1 tsp chaat masala",
                            "Salt to taste"
                        ],
                        hi: [
                            "8 ब्रेड स्लाइस",
                            "1 खीरा, पतला कटा हुआ",
                            "1 टमाटर, पतला कटा हुआ",
                            "1 प्याज, पतला कटा हुआ",
                            "1 उबला आलू, पतला कटा हुआ",
                            "1/2 कप कद्दूकस किया हुआ गाजर",
                            "1/4 कप कटी हुई शिमला मिर्च",
                            "1/4 कप मक्खन",
                            "2 बड़े चम्मच हरी चटनी",
                            "1 चम्मच चाट मसाला",
                            "नमक स्वादानुसार"
                        ]
                    },
                    steps: {
                        en: [
                            "Apply butter on one side of each bread slice.",
                            "Spread green chutney on the other side.",
                            "Arrange cucumber, tomato, onion, potato, carrots and bell peppers on four slices.",
                            "Sprinkle chaat masala and salt.",
                            "Cover with the remaining bread slices, butter side up.",
                            "Grill in a sandwich maker until golden and crisp.",
                            "Cut diagonally and serve hot with ketchup."
                        ],
                        hi: [
                            "प्रत्येक ब्रेड स्लाइस के एक तरफ मक्खन लगाएं।",
                            "दूसरी तरफ हरी चटनी फैलाएं।",
                            "चार स्लाइस पर खीरा, टमाटर, प्याज, आलू, गाजर और शिमला मिर्च व्यवस्थित करें।",
                            "चाट मसाला और नमक छिड़कें।",
                            "शेष ब्रेड स्लाइस से ढक दें, मक्खन वाली तरफ ऊपर।",
                            "सैंडविच मेकर में सुनहरा और कुरकुरा होने तक ग्रिल करें।",
                            "तिरछा काटें और गर्मागर्म केचप के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Vegetable sandwich is a balanced meal with carbohydrates from bread and vitamins from fresh vegetables. It's quick to make and provides fiber for digestion. This protein-rich breakfast helps in muscle development.",
                        hi: "सब्जी सैंडविच ब्रेड से कार्बोहाइड्रेट और ताजी सब्जियों से विटामिन के साथ एक संतुलित भोजन है। इसे बनाना जल्दी है और पाचन के लिए फाइबर प्रदान करता है। यह प्रोटीन से भरपूर नाश्ता मांसपेशियों के विकास में मदद करता है।"
                    }
                },
                {
                    name: "Moong Dal Dosa",
                    image: "img/moongdaldosa.jpg",
                    ingredients: {
                        en: [
                            "1 cup split yellow moong dal",
                            "1/4 cup rice",
                            "1 green chili",
                            "1 inch ginger",
                            "1/2 tsp cumin seeds",
                            "Salt to taste",
                            "Water as needed",
                            "Oil for cooking"
                        ],
                        hi: [
                            "1 कप पीली मूंग दाल",
                            "1/4 कप चावल",
                            "1 हरी मिर्च",
                            "1 इंच अदरक",
                            "1/2 चम्मच जीरा",
                            "नमक स्वादानुसार",
                            "आवश्यकतानुसार पानी",
                            "पकाने के लिए तेल"
                        ]
                    },
                    steps: {
                        en: [
                            "Soak moong dal and rice for 3-4 hours.",
                            "Drain and grind with green chili, ginger, cumin seeds and salt to a smooth batter.",
                            "Add water to make pouring consistency.",
                            "Heat a non-stick pan and grease with oil.",
                            "Pour a ladleful of batter and spread into thin dosa.",
                            "Drizzle oil around the edges and cook until crisp.",
                            "Flip and cook the other side.",
                            "Serve hot with coconut chutney."
                        ],
                        hi: [
                            "मूंग दाल और चावल को 3-4 घंटे के लिए भिगोएँ।",
                            "निकालकर हरी मिर्च, अदरक, जीरा और नमक के साथ चिकना घोल पीस लें।",
                            "डालने की स्थिरता बनाने के लिए पानी डालें।",
                            "नॉन-स्टिक पैन गर्म करें और तेल लगाएं।",
                            "एक कलछुल घोल डालें और पतला डोसा फैलाएं।",
                            "किनारों पर तेल डालें और कुरकुरा होने तक पकाएं।",
                            "पलटें और दूसरी तरफ पकाएं।",
                            "गर्मागर्म नारियल की चटनी के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Moong dal dosa is rich in protein and easy to digest. It's gluten-free and provides essential amino acids. This low-calorie breakfast is ideal for weight management and provides sustained energy.",
                        hi: "मूंग दाल डोसा प्रोटीन से भरपूर और पचने में आसान है। यह ग्लूटेन-मुक्त है और आवश्यक अमीनो एसिड प्रदान करता है। यह कम कैलोरी वाला नाश्ता वजन प्रबंधन के लिए आदर्श है और सतत ऊर्जा प्रदान करता है।"
                    }
                },
                {
                    name: "Rava Idli",
                    image: "img/ravaidli.jpg",
                    ingredients: {
                        en: [
                            "1 cup semolina (rava)",
                            "1 cup yogurt",
                            "1/2 cup water",
                            "1 tsp mustard seeds",
                            "1 tsp urad dal",
                            "1/2 tsp baking soda",
                            "1 carrot, grated",
                            "1/4 cup green peas",
                            "1 green chili, finely chopped",
                            "1 tbsp cashews, chopped",
                            "1 tbsp coriander leaves, chopped",
                            "Salt to taste",
                            "Oil for greasing"
                        ],
                        hi: [
                            "1 कप सूजी (रवा)",
                            "1 कप दही",
                            "1/2 कप पानी",
                            "1 चम्मच राई के दाने",
                            "1 चम्मच उड़द दाल",
                            "1/2 चम्मच बेकिंग सोडा",
                            "1 गाजर, कद्दूकस की हुई",
                            "1/4 कप हरी मटर",
                            "1 हरी मिर्च, बारीक कटी हुई",
                            "1 बड़ा चम्मच काजू, कटा हुआ",
                            "1 बड़ा चम्मच धनिया पत्ती, कटी हुई",
                            "नमक स्वादानुसार",
                            "ग्रीस करने के लिए तेल"
                        ]
                    },
                    steps: {
                        en: [
                            "Dry roast semolina in a pan until aromatic. Let it cool.",
                            "In a bowl, mix roasted semolina, yogurt, water, and salt. Rest for 20 minutes.",
                            "Heat oil in a small pan. Add mustard seeds and urad dal. Let them splutter.",
                            "Add cashews and sauté until golden. Add to batter along with vegetables.",
                            "Add baking soda and mix well.",
                            "Grease idli molds and pour batter.",
                            "Steam for 12-15 minutes until cooked.",
                            "Serve hot with sambar and coconut chutney."
                        ],
                        hi: [
                            "एक पैन में सूजी को सुखा भूनें जब तक सुगंधित न हो जाए। ठंडा होने दें।",
                            "एक कटोरे में भुनी हुई सूजी, दही, पानी और नमक मिलाएं। 20 मिनट के लिए रख दें।",
                            "एक छोटे पैन में तेल गर्म करें। राई और उड़द दाल डालें। चटकने दें।",
                            "काजू डालें और सुनहरा होने तक भूनें। बैटर में सब्जियों के साथ मिलाएं।",
                            "बेकिंग सोडा डालें और अच्छी तरह मिलाएं।",
                            "इडली के सांचों को ग्रीस करें और बैटर डालें।",
                            "12-15 मिनट तक भाप में पकाएं जब तक पक न जाए।",
                            "गर्मागर्म सांभर और नारियल चटनी के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Rava idli is a quick and easy breakfast option. Semolina provides carbohydrates for energy while yogurt adds protein and probiotics. Vegetables contribute vitamins and minerals. This light meal is easy to digest.",
                        hi: "रवा इडली एक त्वरित और आसान नाश्ता विकल्प है। सूजी ऊर्जा के लिए कार्बोहाइड्रेट प्रदान करती है जबकि दही प्रोटीन और प्रोबायोटिक्स जोड़ती है। सब्जियां विटामिन और खनिजों में योगदान करती हैं। यह हल्का भोजन पचने में आसान है।"
                    }
                },
                {
                    name: "Vegetable Poha",
                    image: "img/vegetablepoha.jpg",
                    ingredients: {
                        en: [
                            "2 cups thick poha",
                            "2 tbsp oil",
                            "1 tsp mustard seeds",
                            "1 onion, chopped",
                            "1 potato, diced",
                            "1/4 cup green peas",
                            "1/4 cup carrots, diced",
                            "2 green chilies, slit",
                            "8-10 curry leaves",
                            "1/4 tsp turmeric powder",
                            "1 tbsp lemon juice",
                            "Salt to taste",
                            "Fresh coriander for garnish"
                        ],
                        hi: [
                            "2 कप मोटा पोहा",
                            "2 बड़े चम्मच तेल",
                            "1 चम्मच राई के दाने",
                            "1 प्याज, कटा हुआ",
                            "1 आलू, कटा हुआ",
                            "1/4 कप हरी मटर",
                            "1/4 कप गाजर, कटा हुआ",
                            "2 हरी मिर्च, चीरी हुई",
                            "8-10 करी पत्ते",
                            "1/4 चम्मच हल्दी पाउडर",
                            "1 बड़ा चम्मच नींबू का रस",
                            "नमक स्वादानुसार",
                            "ताजा धनिया गार्निश के लिए"
                        ]
                    },
                    steps: {
                        en: [
                            "Rinse poha in water and drain. Set aside.",
                            "Heat oil in a pan. Add mustard seeds and let them splutter.",
                            "Add onions and sauté until translucent.",
                            "Add potatoes, peas, carrots, green chilies, and curry leaves. Cook until potatoes are tender.",
                            "Add turmeric powder and salt. Mix well.",
                            "Add drained poha and mix gently. Cook for 3-4 minutes.",
                            "Turn off heat. Add lemon juice and mix.",
                            "Garnish with fresh coriander and serve hot."
                        ],
                        hi: [
                            "पोहे को पानी में धोकर निथार लें। अलग रख दें।",
                            "पैन में तेल गर्म करें। राई डालें और चटकने दें।",
                            "प्याज डालें और पारदर्शी होने तक भूनें।",
                            "आलू, मटर, गाजर, हरी मिर्च और करी पत्ते डालें। आलू के नरम होने तक पकाएं।",
                            "हल्दी पाउडर और नमक डालें। अच्छी तरह मिलाएं।",
                            "निथारा हुआ पोहा डालें और हल्के से मिलाएं। 3-4 मिनट तक पकाएं।",
                            "आंच बंद करें। नींबू का रस डालें और मिलाएं।",
                            "ताजा धनिया से गार्निश करें और गर्मागर्म परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Vegetable poha is rich in iron from flattened rice. The vegetables add fiber, vitamins and minerals. This light meal is easy to digest and provides sustained energy without feeling heavy.",
                        hi: "सब्जी पोहा चपटे चावल से आयरन से भरपूर होता है। सब्जियां फाइबर, विटामिन और खनिज जोड़ती हैं। यह हल्का भोजन पचने में आसान है और भारी महसूस किए बिना सतत ऊर्जा प्रदान करता है।"
                    }
                }
            ],
            lunch: [
                {
                    name: "Rajma Chawal",
                    image: "img/rajmachawal.jpg",
                    ingredients: {
                        en: [
                            "1 cup rajma (kidney beans), soaked overnight",
                            "2 onions, finely chopped",
                            "3 tomatoes, pureed",
                            "2 green chilies, slit",
                            "1 tbsp ginger-garlic paste",
                            "1 tsp cumin seeds",
                            "1 tsp turmeric powder",
                            "1 tbsp coriander powder",
                            "1 tsp garam masala",
                            "2 tbsp oil",
                            "Salt to taste",
                            "Fresh coriander for garnish",
                            "Cooked rice for serving"
                        ],
                        hi: [
                            "1 कप राजमा, रात भर भिगोया हुआ",
                            "2 प्याज, बारीक कटा हुआ",
                            "3 टमाटर, प्यूरी किया हुआ",
                            "2 हरी मिर्च, चीरा लगा हुआ",
                            "1 बड़ा चम्मच अदरक-लहसुन पेस्ट",
                            "1 चम्मच जीरा",
                            "1 चम्मच हल्दी पाउडर",
                            "1 बड़ा चम्मच धनिया पाउडर",
                            "1 चम्मच गरम मसाला",
                            "2 बड़े चम्मच तेल",
                            "नमक स्वादानुसार",
                            "ताजा धनिया गार्निश के लिए",
                            "पक्के हुए चावल परोसने के लिए"
                        ]
                    },
                    steps: {
                        en: [
                            "Pressure cook soaked rajma until soft (about 15-20 minutes)",
                            "Heat oil in a pan. Add cumin seeds and let them splutter",
                            "Add chopped onions and sauté until golden brown",
                            "Add ginger-garlic paste and green chilies. Sauté for 2 minutes",
                            "Add tomato puree and cook until oil separates",
                            "Add turmeric, coriander powder, and salt. Cook for 2 minutes",
                            "Add cooked rajma along with its water. Simmer for 10 minutes",
                            "Add garam masala and garnish with fresh coriander",
                            "Serve hot with steamed rice"
                        ],
                        hi: [
                            "भीगे हुए राजमा को नरम होने तक प्रेशर कुक करें (लगभग 15-20 मिनट)",
                            "एक पैन में तेल गर्म करें। जीरा डालें और चटकने दें",
                            "कटा हुआ प्याज डालें और सुनहरा होने तक भूनें",
                            "अदरक-लहसुन पेस्ट और हरी मिर्च डालें। 2 मिनट तक भूनें",
                            "टमाटर प्यूरी डालें और तेल अलग होने तक पकाएं",
                            "हल्दी, धनिया पाउडर और नमक डालें। 2 मिनट तक पकाएं",
                            "पके हुए राजमा को उसके पानी के साथ डालें। 10 मिनट तक उबालें",
                            "गरम मसाला डालें और ताजा धनिया से गार्निश करें",
                            "भाप में पके चावल के साथ गर्म परोसें"
                        ]
                    },
                    benefits: {
                        en: "Rajma is an excellent source of plant-based protein and fiber. It helps in maintaining blood sugar levels and promotes gut health. Combined with rice, it provides a complete protein profile with all essential amino acids.",
                        hi: "राजमा पौधे आधारित प्रोटीन और फाइबर का एक उत्कृष्ट स्रोत है। यह रक्त शर्करा के स्तर को बनाए रखने में मदद करता है और आंतों के स्वास्थ्य को बढ़ावा देता है। चावल के साथ संयुक्त, यह सभी आवश्यक अमीनो एसिड के साथ एक पूर्ण प्रोटीन प्रोफ़ाइल प्रदान करता है।"
                    }
                },
                {
                    name: "Chole Bhature",
                    image: "img/cholebhature.jpg",
                    ingredients: {
                        en: [
                            "1 cup chickpeas (chole), soaked overnight",
                            "2 onions, finely chopped",
                            "2 tomatoes, pureed",
                            "1 tbsp ginger-garlic paste",
                            "1 tsp cumin seeds",
                            "1 tbsp chole masala",
                            "1/2 tsp turmeric powder",
                            "1/2 tsp red chili powder",
                            "2 tbsp oil",
                            "Salt to taste",
                            "For Bhature:",
                            "2 cups all-purpose flour",
                            "1/2 cup yogurt",
                            "1 tsp sugar",
                            "1/2 tsp baking soda",
                            "Salt to taste",
                            "Water as needed",
                            "Oil for frying"
                        ],
                        hi: [
                            "1 कप छोले, रात भर भिगोए हुए",
                            "2 प्याज, बारीक कटा हुआ",
                            "2 टमाटर, प्यूरी किया हुआ",
                            "1 बड़ा चम्मच अदरक-लहसुन पेस्ट",
                            "1 चम्मच जीरा",
                            "1 बड़ा चम्मच छोले मसाला",
                            "1/2 चम्मच हल्दी पाउडर",
                            "1/2 चम्मच लाल मिर्च पाउडर",
                            "2 बड़े चम्मच तेल",
                            "नमक स्वादानुसार",
                            "भठूरे के लिए:",
                            "2 कप मैदा",
                            "1/2 कप दही",
                            "1 चम्मच चीनी",
                            "1/2 चम्मच बेकिंग सोडा",
                            "नमक स्वादानुसार",
                            "आवश्यकतानुसार पानी",
                            "तलने के लिए तेल"
                        ]
                    },
                    steps: {
                        en: [
                            "Pressure cook chickpeas until soft. Drain and set aside.",
                            "Heat oil in a pan. Add cumin seeds and let them splutter.",
                            "Add onions and sauté until golden brown.",
                            "Add ginger-garlic paste and sauté for 2 minutes.",
                            "Add tomato puree and cook until oil separates.",
                            "Add spices and cooked chickpeas. Simmer for 10 minutes.",
                            "For bhature: Mix flour, yogurt, sugar, baking soda and salt.",
                            "Add water and knead into a soft dough. Cover and rest for 2 hours.",
                            "Divide dough into balls, roll into circles and deep fry until puffed and golden.",
                            "Serve hot chole with bhature and onion slices."
                        ],
                        hi: [
                            "छोले को नरम होने तक प्रेशर कुक करें। निथार कर अलग रख दें।",
                            "पैन में तेल गर्म करें। जीरा डालें और चटकने दें।",
                            "प्याज डालें और सुनहरा होने तक भूनें।",
                            "अदरक-लहसुन पेस्ट डालें और 2 मिनट तक भूनें।",
                            "टमाटर प्यूरी डालें और तेल अलग होने तक पकाएं।",
                            "मसाले और पके हुए छोले डालें। 10 मिनट तक उबालें।",
                            "भठूरे के लिए: मैदा, दही, चीनी, बेकिंग सोडा और नमक मिलाएं।",
                            "पानी डालकर नरम आटा गूंथ लें। ढककर 2 घंटे रख दें।",
                            "आटे को गोलों में बांटें, गोल बेलें और फूलकर सुनहरा होने तक तलें।",
                            "गर्म छोले को भठूरे और प्याज के स्लाइस के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Chickpeas are rich in protein and fiber, essential for muscle growth and digestion. The combination with bhature provides a balanced meal with carbohydrates for energy. This popular North Indian dish is both nutritious and satisfying.",
                        hi: "छोले प्रोटीन और फाइबर से भरपूर होते हैं, जो मांसपेशियों के विकास और पाचन के लिए आवश्यक हैं। भठूरे के साथ संयोजन ऊर्जा के लिए कार्बोहाइड्रेट के साथ एक संतुलित भोजन प्रदान करता है। यह लोकप्रिय उत्तर भारतीय व्यंजन पौष्टिक और संतोषजनक दोनों है।"
                    }
                },
                {
                    name: "Vegetable Pulao",
                    image: "img/vegetablepulao.jpg",
                    ingredients: {
                        en: [
                            "1 cup basmati rice, soaked for 30 minutes",
                            "1 cup mixed vegetables (carrots, peas, beans, cauliflower)",
                            "1 onion, sliced",
                            "1 tomato, chopped",
                            "2 green chilies, slit",
                            "1 tbsp ginger-garlic paste",
                            "1 tsp cumin seeds",
                            "2 cloves",
                            "1-inch cinnamon stick",
                            "2 cardamom pods",
                            "1/2 cup mint leaves",
                            "2 tbsp oil or ghee",
                            "Salt to taste",
                            "2 cups water"
                        ],
                        hi: [
                            "1 कप बासमती चावल, 30 मिनट के लिए भिगोएँ",
                            "1 कप मिश्रित सब्जियां (गाजर, मटर, बीन्स, फूलगोभी)",
                            "1 प्याज, कटा हुआ",
                            "1 टमाटर, कटा हुआ",
                            "2 हरी मिर्च, चीरा लगा हुआ",
                            "1 बड़ा चम्मच अदरक-लहसुन पेस्ट",
                            "1 चम्मच जीरा",
                            "2 लौंग",
                            "1 इंच दालचीनी का टुकड़ा",
                            "2 इलायची",
                            "1/2 कप पुदीना पत्तियां",
                            "2 बड़े चम्मच तेल या घी",
                            "नमक स्वादानुसार",
                            "2 कप पानी"
                        ]
                    },
                    steps: {
                        en: [
                            "Heat oil/ghee in a pressure cooker. Add whole spices and cumin seeds. Sauté until fragrant",
                            "Add sliced onions and sauté until golden brown",
                            "Add ginger-garlic paste and green chilies. Sauté for 2 minutes",
                            "Add tomatoes and cook until soft",
                            "Add mixed vegetables and sauté for 3-4 minutes",
                            "Drain soaked rice and add to the cooker. Gently mix",
                            "Add water, salt, and mint leaves. Stir well",
                            "Close the lid and cook for 2 whistles on medium flame",
                            "Let pressure release naturally. Fluff the rice with a fork",
                            "Serve hot with raita or curry"
                        ],
                        hi: [
                            "प्रेशर कुकर में तेल/घी गर्म करें। साबुत मसाले और जीरा डालें। सुगंध आने तक भूनें",
                            "कटा हुआ प्याज डालें और सुनहरा होने तक भूनें",
                            "अदरक-लहसुन पेस्ट और हरी मिर्च डालें। 2 मिनट तक भूनें",
                            "टमाटर डालें और नरम होने तक पकाएं",
                            "मिश्रित सब्जियां डालें और 3-4 मिनट तक भूनें",
                            "भीगे हुए चावल को निकालें और कुकर में डालें। हल्के हाथ से मिलाएं",
                            "पानी, नमक और पुदीना पत्तियां डालें। अच्छी तरह हिलाएं",
                            "ढक्कन बंद करें और मध्यम आंच पर 2 सीटी आने तक पकाएं",
                            "प्रेशर अपने आप रिलीज होने दें। कांटे से चावल को फ्लफ करें",
                            "रायता या करी के साथ गर्म परोसें"
                        ]
                    },
                    benefits: {
                        en: "Vegetable pulao is a balanced meal with carbohydrates from rice, fiber and vitamins from vegetables, and protein from peas. The spices aid digestion and boost metabolism. It's a light yet nutritious dinner option.",
                        hi: "वेजिटेबल पुलाव चावल से कार्बोहाइड्रेट, सब्जियों से फाइबर और विटामिन, और मटर से प्रोटीन के साथ एक संतुलित भोजन है। मसाले पाचन में सहायता करते हैं और चयापचय को बढ़ावा देते हैं। यह एक हल्का लेकिन पौष्टिक डिनर विकल्प है।"
                    }
                },
                {
                    name: "Paneer Butter Masala",
                    image: "img/paneerbuttermasala.jpg",
                    ingredients: {
                        en: [
                            "250g paneer, cubed",
                            "2 onions, chopped",
                            "3 tomatoes, chopped",
                            "1 tbsp ginger-garlic paste",
                            "1 tsp red chili powder",
                            "1 tsp garam masala",
                            "1/2 cup cream",
                            "2 tbsp butter",
                            "1 tbsp kasuri methi",
                            "1 tsp sugar",
                            "Salt to taste"
                        ],
                        hi: [
                            "250g पनीर, क्यूब्स में कटा हुआ",
                            "2 प्याज, कटा हुआ",
                            "3 टमाटर, कटा हुआ",
                            "1 बड़ा चम्मच अदरक-लहसुन पेस्ट",
                            "1 चम्मच लाल मिर्च पाउडर",
                            "1 चम्मच गरम मसाला",
                            "1/2 कप क्रीम",
                            "2 बड़े चम्मच मक्खन",
                            "1 बड़ा चम्मच कसूरी मेथी",
                            "1 चम्मच चीनी",
                            "नमक स्वादानुसार"
                        ]
                    },
                    steps: {
                        en: [
                            "Sauté onions until golden. Add ginger-garlic paste and cook for 2 minutes.",
                            "Add tomatoes and cook until soft. Let it cool and blend to smooth paste.",
                            "Heat butter in a pan. Add the blended paste and cook for 5 minutes.",
                            "Add red chili powder, garam masala, salt and sugar. Cook for 2 minutes.",
                            "Add paneer cubes and simmer for 5 minutes.",
                            "Add cream and kasuri methi. Cook for 2 minutes.",
                            "Serve hot with naan or rice."
                        ],
                        hi: [
                            "प्याज को सुनहरा होने तक भूनें। अदरक-लहसुन पेस्ट डालें और 2 मिनट तक पकाएं।",
                            "टमाटर डालें और नरम होने तक पकाएं। ठंडा करके चिकना पेस्ट ब्लेंड कर लें।",
                            "पैन में मक्खन गर्म करें। ब्लेंड किया हुआ पेस्ट डालें और 5 मिनट तक पकाएं।",
                            "लाल मिर्च पाउडर, गरम मसाला, नमक और चीनी डालें। 2 मिनट तक पकाएं।",
                            "पनीर के क्यूब्स डालें और 5 मिनट तक उबालें।",
                            "क्रीम और कसूरी मेथी डालें। 2 मिनट तक पकाएं।",
                            "गर्मागर्म नान या चावल के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Paneer is an excellent source of protein and calcium, essential for growing teenagers. The tomatoes provide lycopene, an antioxidant that boosts immunity. This rich dish provides energy and satisfies hunger effectively.",
                        hi: "पनीर प्रोटीन और कैल्शियम का एक उत्कृष्ट स्रोत है, जो बढ़ते किशोरों के लिए आवश्यक है। टमाटर लाइकोपीन प्रदान करते हैं, एक एंटीऑक्सीडेंट जो प्रतिरक्षा को बढ़ावा देता है। यह समृद्ध व्यंजन ऊर्जा प्रदान करता है और भूख को प्रभावी ढंग से संतुष्ट करता है।"
                    }
                },
                {
                    name: "Dal Makhani",
                    image: "img/dalmakhani.jpg",
                    ingredients: {
                        en: [
                            "1 cup whole black urad dal",
                            "1/4 cup rajma",
                            "1 onion, chopped",
                            "2 tomatoes, pureed",
                            "1 tbsp ginger-garlic paste",
                            "1 tsp cumin seeds",
                            "1 tsp red chili powder",
                            "1/2 tsp turmeric powder",
                            "1 tsp garam masala",
                            "2 tbsp butter",
                            "2 tbsp cream",
                            "Salt to taste"
                        ],
                        hi: [
                            "1 कप साबुत काली उड़द दाल",
                            "1/4 कप राजमा",
                            "1 प्याज, कटा हुआ",
                            "2 टमाटर, प्यूरी किया हुआ",
                            "1 बड़ा चम्मच अदरक-लहसुन पेस्ट",
                            "1 चम्मच जीरा",
                            "1 चम्मच लाल मिर्च पाउडर",
                            "1/2 चम्मच हल्दी पाउडर",
                            "1 चम्मच गरम मसाला",
                            "2 बड़े चम्मच मक्खन",
                            "2 बड़े चम्मच क्रीम",
                            "नमक स्वादानुसार"
                        ]
                    },
                    steps: {
                        en: [
                            "Soak urad dal and rajma overnight. Pressure cook until soft.",
                            "Heat butter in a pan. Add cumin seeds and let them splutter.",
                            "Add onions and sauté until golden. Add ginger-garlic paste and cook for 2 minutes.",
                            "Add tomato puree and cook until oil separates.",
                            "Add spices and cooked dal. Simmer for 15 minutes.",
                            "Add cream and simmer for 5 minutes.",
                            "Serve hot with naan or rice."
                        ],
                        hi: [
                            "उड़द दाल और राजमा रात भर भिगोएँ। नरम होने तक प्रेशर कुक करें।",
                            "पैन में मक्खन गर्म करें। जीरा डालें और चटकने दें।",
                            "प्याज डालें और सुनहरा होने तक भूनें। अदरक-लहसुन पेस्ट डालें और 2 मिनट तक पकाएं।",
                            "टमाटर प्यूरी डालें और तेल अलग होने तक पकाएं।",
                            "मसाले और पकी हुई दाल डालें। 15 मिनट तक उबालें।",
                            "क्रीम डालें और 5 मिनट तक उबालें।",
                            "गर्मागर्म नान या चावल के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Dal makhani is rich in protein and fiber from lentils. The slow cooking process enhances its nutritional value. This creamy dish provides sustained energy and is excellent for muscle development.",
                        hi: "दाल मखनी दालों से प्रोटीन और फाइबर से भरपूर होती है। धीमी पकाने की प्रक्रिया इसके पोषण मूल्य को बढ़ाती है। यह मलाईदार व्यंजन सतत ऊर्जा प्रदान करता है और मांसपेशियों के विकास के लिए उत्कृष्ट है।"
                    }
                },
                {
                    name: "Vegetable Biryani",
                    image: "img/vegetablebiryani.jpg",
                    ingredients: {
                        en: [
                            "1 cup basmati rice",
                            "1 cup mixed vegetables (carrots, beans, peas, cauliflower)",
                            "1 onion, sliced",
                            "1 tomato, chopped",
                            "1/4 cup mint leaves",
                            "1/4 cup coriander leaves",
                            "1 tbsp ginger-garlic paste",
                            "1 tsp biryani masala",
                            "1/2 cup yogurt",
                            "2 tbsp oil",
                            "Whole spices (2 cloves, 1 cinnamon, 2 cardamom)",
                            "Saffron strands in milk",
                            "Salt to taste"
                        ],
                        hi: [
                            "1 कप बासमती चावल",
                            "1 कप मिश्रित सब्जियां (गाजर, बीन्स, मटर, फूलगोभी)",
                            "1 प्याज, कटा हुआ",
                            "1 टमाटर, कटा हुआ",
                            "1/4 कप पुदीना पत्तियां",
                            "1/4 कप धनिया पत्तियां",
                            "1 बड़ा चम्मच अदरक-लहसुन पेस्ट",
                            "1 चम्मच बिरयानी मसाला",
                            "1/2 कप दही",
                            "2 बड़े चम्मच तेल",
                            "साबुत मसाले (2 लौंग, 1 दालचीनी, 2 इलायची)",
                            "दूध में केसर के तार",
                            "नमक स्वादानुसार"
                        ]
                    },
                    steps: {
                        en: [
                            "Soak rice for 30 minutes. Parboil and drain.",
                            "Heat oil in a pan. Add whole spices and onions. Sauté until golden.",
                            "Add ginger-garlic paste and tomatoes. Cook until soft.",
                            "Add vegetables, biryani masala, salt and half of herbs. Cook for 5 minutes.",
                            "Layer rice and vegetable mixture in a heavy-bottomed pot.",
                            "Sprinkle saffron milk and remaining herbs.",
                            "Cover and cook on low heat for 20 minutes.",
                            "Serve hot with raita."
                        ],
                        hi: [
                            "चावल को 30 मिनट के लिए भिगोएँ। अधपका करके निथार लें।",
                            "पैन में तेल गर्म करें। साबुत मसाले और प्याज डालें। सुनहरा होने तक भूनें।",
                            "अदरक-लहसुन पेस्ट और टमाटर डालें। नरम होने तक पकाएं।",
                            "सब्जियां, बिरयानी मसाला, नमक और आधी जड़ी-बूटियां डालें। 5 मिनट तक पकाएं।",
                            "एक भारी तले वाले बर्तन में चावल और सब्जी का मिश्रण लेयर करें।",
                            "केसर का दूध और शेष जड़ी-बूटियां छिड़कें।",
                            "ढककर धीमी आंच पर 20 मिनट तक पकाएं।",
                            "गर्मागर्म रायते के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Vegetable biryani provides a balanced meal with carbohydrates from rice, protein from vegetables, and fiber. The aromatic spices aid digestion. This flavorful dish is both nutritious and satisfying.",
                        hi: "वेजिटेबल बिरयानी चावल से कार्बोहाइड्रेट, सब्जियों से प्रोटीन और फाइबर के साथ एक संतुलित भोजन प्रदान करती है। सुगंधित मसाले पाचन में सहायता करते हैं। यह स्वादिष्ट व्यंजन पौष्टिक और संतोषजनक दोनों है।"
                    }
                },
                {
                    name: "Sambar Rice",
                    image: "img/sambharrice.jpg",
                    ingredients: {
                        en: [
                            "1 cup toor dal",
                            "1 cup mixed vegetables (drumstick, pumpkin, eggplant)",
                            "1 small onion, chopped",
                            "1 tomato, chopped",
                            "2 tbsp sambar powder",
                            "1/2 tsp turmeric powder",
                            "1 tsp mustard seeds",
                            "2 dry red chilies",
                            "A pinch of asafoetida",
                            "2 tbsp oil",
                            "Tamarind pulp",
                            "Salt to taste",
                            "Cooked rice for serving"
                        ],
                        hi: [
                            "1 कप तूर दाल",
                            "1 कप मिश्रित सब्जियां (ड्रमस्टिक, कद्दू, बैंगन)",
                            "1 छोटा प्याज, कटा हुआ",
                            "1 टमाटर, कटा हुआ",
                            "2 बड़े चम्मच सांभर पाउडर",
                            "1/2 चम्मच हल्दी पाउडर",
                            "1 चम्मच राई के दाने",
                            "2 सूखी लाल मिर्च",
                            "एक चुटकी हींग",
                            "2 बड़े चम्मच तेल",
                            "इमली का गूदा",
                            "नमक स्वादानुसार",
                            "पक्के हुए चावल परोसने के लिए"
                        ]
                    },
                    steps: {
                        en: [
                            "Pressure cook dal until soft. Mash and set aside.",
                            "Cook vegetables in water until tender.",
                            "Add cooked dal, sambar powder, turmeric, tamarind pulp and salt. Simmer for 10 minutes.",
                            "Heat oil in a small pan. Add mustard seeds, red chilies and asafoetida. Let them splutter.",
                            "Add tempering to sambar. Mix well.",
                            "Serve hot sambar over rice."
                        ],
                        hi: [
                            "दाल को नरम होने तक प्रेशर कुक करें। मैश करके अलग रख दें।",
                            "सब्जियों को पानी में नरम होने तक पकाएं।",
                            "पकी हुई दाल, सांभर पाउडर, हल्दी, इमली का गूदा और नमक डालें। 10 मिनट तक उबालें।",
                            "एक छोटे पैन में तेल गर्म करें। राई, लाल मिर्च और हींग डालें। चटकने दें।",
                            "तड़का सांभर में डालें। अच्छी तरह मिलाएं।",
                            "गर्म सांभर को चावल पर परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Sambar rice is a complete meal providing carbohydrates, protein, fiber, and essential vitamins. The lentils offer plant-based protein while vegetables add micronutrients. This South Indian staple is both nutritious and comforting.",
                        hi: "सांभर चावल एक संपूर्ण भोजन है जो कार्बोहाइड्रेट, प्रोटीन, फाइबर और आवश्यक विटामिन प्रदान करता है। दालें पौधे आधारित प्रोटीन प्रदान करती हैं जबकि सब्जियां सूक्ष्म पोषक तत्व जोड़ती हैं। यह दक्षिण भारतीय मुख्य भोजन पौष्टिक और आरामदायक दोनों है।"
                    }
                },
                {
                    name: "Kadhi Chawal",
                    image: "img/kadhichawal.jpg",
                    ingredients: {
                        en: [
                            "1 cup besan (gram flour)",
                            "2 cups yogurt",
                            "4 cups water",
                            "1 tsp turmeric powder",
                            "1 tsp red chili powder",
                            "Salt to taste",
                            "For Pakoras:",
                            "1 cup besan",
                            "1 onion, chopped",
                            "1 green chili, chopped",
                            "Water as needed",
                            "Oil for frying",
                            "For Tempering:",
                            "2 tbsp ghee",
                            "1 tsp mustard seeds",
                            "1 tsp cumin seeds",
                            "2 dry red chilies",
                            "A pinch of asafoetida"
                        ],
                        hi: [
                            "1 कप बेसन",
                            "2 कप दही",
                            "4 कप पानी",
                            "1 चम्मच हल्दी पाउडर",
                            "1 चम्मच लाल मिर्च पाउडर",
                            "नमक स्वादानुसार",
                            "पकोड़े के लिए:",
                            "1 कप बेसन",
                            "1 प्याज, कटा हुआ",
                            "1 हरी मिर्च, कटी हुई",
                            "आवश्यकतानुसार पानी",
                            "तलने के लिए तेल",
                            "तड़के के लिए:",
                            "2 बड़े चम्मच घी",
                            "1 चम्मच राई के दाने",
                            "1 चम्मच जीरा",
                            "2 सूखी लाल मिर्च",
                            "एक चुटकी हींग"
                        ]
                    },
                    steps: {
                        en: [
                            "Mix besan, yogurt, water, turmeric, red chili powder and salt to make kadhi batter.",
                            "Bring to boil, then simmer for 30 minutes, stirring occasionally.",
                            "For pakoras: Mix besan, onion, green chili and salt with water to make thick batter.",
                            "Drop small portions in hot oil and fry until golden brown.",
                            "Add pakoras to kadhi and simmer for 5 minutes.",
                            "For tempering: Heat ghee. Add mustard seeds, cumin seeds, red chilies and asafoetida. Let them splutter.",
                            "Pour tempering over kadhi. Serve hot with rice."
                        ],
                        hi: [
                            "कढ़ी का घोल बनाने के लिए बेसन, दही, पानी, हल्दी, लाल मिर्च पाउडर और नमक मिलाएं।",
                            "उबाल लें, फिर 30 मिनट तक उबालें, बीच-बीच में हिलाते रहें।",
                            "पकोड़े के लिए: बेसन, प्याज, हरी मिर्च और नमक पानी के साथ गाढ़ा घोल बना लें।",
                            "गर्म तेल में छोटे-छोटे हिस्से डालें और सुनहरा भूरा होने तक तलें।",
                            "कढ़ी में पकोड़े डालें और 5 मिनट तक उबालें।",
                            "तड़के के लिए: घी गर्म करें। राई, जीरा, लाल मिर्च और हींग डालें। चटकने दें।",
                            "कढ़ी पर तड़का डालें। गर्मागर्म चावल के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Kadhi is rich in probiotics from yogurt, great for gut health. The pakoras add protein and texture. This comforting dish provides calcium and protein essential for bone health and muscle development.",
                        hi: "कढ़ी दही से प्रोबायोटिक्स से भरपूर होती है, जो आंतों के स्वास्थ्य के लिए बहुत अच्छी है। पकोड़े प्रोटीन और बनावट जोड़ते हैं। यह आरामदायक व्यंजन हड्डियों के स्वास्थ्य और मांसपेशियों के विकास के लिए आवश्यक कैल्शियम और प्रोटीन प्रदान करता है।"
                    }
                },
                {
                    name: "Jeera Aloo with Roti",
                    image: "img/jeeraaloowithroti.jpg",
                    ingredients: {
                        en: [
                            "4 potatoes, boiled and cubed",
                            "2 tbsp oil",
                            "1 tsp cumin seeds",
                            "1 onion, chopped",
                            "1 tsp ginger paste",
                            "1 green chili, chopped",
                            "1/2 tsp turmeric powder",
                            "1 tsp coriander powder",
                            "1/2 tsp amchur powder",
                            "Salt to taste",
                            "Fresh coriander for garnish"
                        ],
                        hi: [
                            "4 आलू, उबले और क्यूब्स में कटे हुए",
                            "2 बड़े चम्मच तेल",
                            "1 चम्मच जीरा",
                            "1 प्याज, कटा हुआ",
                            "1 चम्मच अदरक पेस्ट",
                            "1 हरी मिर्च, कटी हुई",
                            "1/2 चम्मच हल्दी पाउडर",
                            "1 चम्मच धनिया पाउडर",
                            "1/2 चम्मच आमचूर पाउडर",
                            "नमक स्वादानुसार",
                            "ताजा धनिया गार्निश के लिए"
                        ]
                    },
                    steps: {
                        en: [
                            "Heat oil in a pan. Add cumin seeds and let them splutter.",
                            "Add onions and sauté until golden brown.",
                            "Add ginger paste and green chili. Sauté for 1 minute.",
                            "Add turmeric, coriander powder, amchur and salt. Mix well.",
                            "Add boiled potatoes and mix gently. Cook for 5 minutes.",
                            "Garnish with fresh coriander. Serve hot with roti."
                        ],
                        hi: [
                            "पैन में तेल गर्म करें। जीरा डालें और चटकने दें।",
                            "प्याज डालें और सुनहरा होने तक भूनें।",
                            "अदरक पेस्ट और हरी मिर्च डालें। 1 मिनट तक भूनें।",
                            "हल्दी, धनिया पाउडर, आमचूर और नमक डालें। अच्छी तरह मिलाएं।",
                            "उबले हुए आलू डालें और हल्के से मिलाएं। 5 मिनट तक पकाएं।",
                            "ताजा धनिया से गार्निश करें। गर्मागर्म रोटी के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Potatoes are rich in potassium and vitamin C. The cumin seeds aid digestion. This simple dish with roti provides carbohydrates for energy and fiber for digestion. It's a satisfying and easy-to-digest meal.",
                        hi: "आलू पोटेशियम और विटामिन सी से भरपूर होते हैं। जीरा पाचन में सहायता करता है। रोटी के साथ यह सरल व्यंजन ऊर्जा के लिए कार्बोहाइड्रेट और पाचन के लिए फाइबर प्रदान करता है। यह एक संतोषजनक और पचने में आसान भोजन है।"
                    }
                },
                {
                    name: "Mixed Vegetable Curry",
                    image: "img/mixedvegetablecurry.jpg",
                    ingredients: {
                        en: [
                            "2 cups mixed vegetables (carrots, beans, peas, cauliflower)",
                            "1 onion, chopped",
                            "2 tomatoes, pureed",
                            "1 tbsp ginger-garlic paste",
                            "1 tsp cumin seeds",
                            "1 tsp turmeric powder",
                            "1 tbsp coriander powder",
                            "1 tsp garam masala",
                            "2 tbsp oil",
                            "Salt to taste",
                            "Fresh coriander for garnish"
                        ],
                        hi: [
                            "2 कप मिश्रित सब्जियां (गाजर, बीन्स, मटर, फूलगोभी)",
                            "1 प्याज, कटा हुआ",
                            "2 टमाटर, प्यूरी किया हुआ",
                            "1 बड़ा चम्मच अदरक-लहसुन पेस्ट",
                            "1 चम्मच जीरा",
                            "1 चम्मच हल्दी पाउडर",
                            "1 बड़ा चम्मच धनिया पाउडर",
                            "1 चम्मच गरम मसाला",
                            "2 बड़े चम्मच तेल",
                            "नमक स्वादानुसार",
                            "ताजा धनिया गार्निश के लिए"
                        ]
                    },
                    steps: {
                        en: [
                            "Steam vegetables until tender but crisp.",
                            "Heat oil in a pan. Add cumin seeds and let them splutter.",
                            "Add onions and sauté until golden.",
                            "Add ginger-garlic paste and sauté for 2 minutes.",
                            "Add tomato puree and cook until oil separates.",
                            "Add spices and salt. Cook for 2 minutes.",
                            "Add steamed vegetables and mix gently. Simmer for 5 minutes.",
                            "Garnish with fresh coriander. Serve hot with roti or rice."
                        ],
                        hi: [
                            "सब्जियों को नरम लेकिन कुरकुरा होने तक भाप में पकाएं।",
                            "पैन में तेल गर्म करें। जीरा डालें और चटकने दें।",
                            "प्याज डालें और सुनहरा होने तक भूनें।",
                            "अदरक-लहसुन पेस्ट डालें और 2 मिनट तक भूनें।",
                            "टमाटर प्यूरी डालें और तेल अलग होने तक पकाएं।",
                            "मसाले और नमक डालें। 2 मिनट तक पकाएं।",
                            "भाप में पकी सब्जियां डालें और हल्के से मिलाएं। 5 मिनट तक उबालें।",
                            "ताजा धनिया से गार्निश करें। गर्मागर्म रोटी या चावल के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Mixed vegetable curry provides a variety of vitamins, minerals, and antioxidants from different vegetables. The spices aid digestion and boost metabolism. This colorful dish is both nutritious and visually appealing.",
                        hi: "मिश्रित सब्जी करी विभिन्न सब्जियों से विभिन्न प्रकार के विटामिन, खनिज और एंटीऑक्सिडेंट प्रदान करती है। मसाले पाचन में सहायता करते हैं और चयापचय को बढ़ावा देते हैं। यह रंगीन व्यंजन पौष्टिक और दृश्य रूप से आकर्षक दोनों है।"
                    }
                },
                {
                    name: "Tomato Rice",
                    image: "img/tomatorice.jpg",
                    ingredients: {
                        en: [
                            "1 cup basmati rice",
                            "2 tomatoes, chopped",
                            "1 onion, chopped",
                            "2 green chilies, slit",
                            "1 tbsp ginger-garlic paste",
                            "1 tsp mustard seeds",
                            "1 tsp cumin seeds",
                            "1/4 tsp turmeric powder",
                            "1 tsp red chili powder",
                            "1/2 cup peas",
                            "2 tbsp oil",
                            "Salt to taste",
                            "Fresh coriander for garnish"
                        ],
                        hi: [
                            "1 कप बासमती चावल",
                            "2 टमाटर, कटा हुआ",
                            "1 प्याज, कटा हुआ",
                            "2 हरी मिर्च, चीरी हुई",
                            "1 बड़ा चम्मच अदरक-लहसुन पेस्ट",
                            "1 चम्मच राई के दाने",
                            "1 चम्मच जीरा",
                            "1/4 चम्मच हल्दी पाउडर",
                            "1 चम्मच लाल मिर्च पाउडर",
                            "1/2 कप मटर",
                            "2 बड़े चम्मच तेल",
                            "नमक स्वादानुसार",
                            "ताजा धनिया गार्निश के लिए"
                        ]
                    },
                    steps: {
                        en: [
                            "Cook rice and set aside to cool.",
                            "Heat oil in a pan. Add mustard seeds and cumin seeds. Let them splutter.",
                            "Add onions and sauté until golden.",
                            "Add green chilies and ginger-garlic paste. Sauté for 2 minutes.",
                            "Add tomatoes and cook until soft.",
                            "Add turmeric, red chili powder, salt and peas. Cook for 5 minutes.",
                            "Add cooked rice and mix gently.",
                            "Garnish with fresh coriander. Serve hot."
                        ],
                        hi: [
                            "चावल पकाएं और ठंडा होने के लिए अलग रख दें।",
                            "पैन में तेल गर्म करें। राई और जीरा डालें। चटकने दें।",
                            "प्याज डालें और सुनहरा होने तक भूनें।",
                            "हरी मिर्च और अदरक-लहसुन पेस्ट डालें। 2 मिनट तक भूनें।",
                            "टमाटर डालें और नरम होने तक पकाएं।",
                            "हल्दी, लाल मिर्च पाउडर, नमक और मटर डालें। 5 मिनट तक पकाएं।",
                            "पके हुए चावल डालें और हल्के से मिलाएं।",
                            "ताजा धनिया से गार्निश करें। गर्मागर्म परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Tomato rice provides lycopene from tomatoes, an antioxidant that boosts immunity. Rice provides carbohydrates for energy while peas add protein and fiber. This tangy dish is both nutritious and flavorful.",
                        hi: "टमाटर चावल टमाटर से लाइकोपीन प्रदान करता है, एक एंटीऑक्सिडेंट जो प्रतिरक्षा को बढ़ावा देता है। चावल ऊर्जा के लिए कार्बोहाइड्रेट प्रदान करता है जबकि मटर प्रोटीन और फाइबर जोड़ते हैं। यह तीखा व्यंजन पौष्टिक और स्वादिष्ट दोनों है।"
                    }
                }
            ],
            snacks: [
                {
                    name: "Aloo Tikki",
                    image: "img/alootikki.jpg",
                    ingredients: {
                        en: [
                            "4 medium potatoes, boiled and mashed",
                            "1/2 cup boiled peas",
                            "1 onion, finely chopped",
                            "2 green chilies, finely chopped",
                            "1 tbsp ginger, grated",
                            "1 tsp cumin powder",
                            "1 tsp chaat masala",
                            "1/2 tsp red chili powder",
                            "2 tbsp cornflour",
                            "Salt to taste",
                            "Oil for shallow frying",
                            "Tamarind chutney and yogurt for serving"
                        ],
                        hi: [
                            "4 मध्यम आलू, उबाले और मसले हुए",
                            "1/2 कप उबले हुए मटर",
                            "1 प्याज, बारीक कटा हुआ",
                            "2 हरी मिर्च, बारीक कटी हुई",
                            "1 बड़ा चम्मच अदरक, कद्दूकस किया हुआ",
                            "1 चम्मच जीरा पाउडर",
                            "1 चम्मच चाट मसाला",
                            "1/2 चम्मच लाल मिर्च पाउडर",
                            "2 बड़े चम्मच कॉर्नफ्लोर",
                            "नमक स्वादानुसार",
                            "शैलो फ्राइंग के लिए तेल",
                            "इमली की चटनी और दही परोसने के लिए"
                        ]
                    },
                    steps: {
                        en: [
                            "In a bowl, mix mashed potatoes, peas, onion, green chilies, ginger, and spices",
                            "Add cornflour and mix well to form a dough",
                            "Divide the mixture into equal portions and shape into round tikkis",
                            "Heat oil in a pan. Shallow fry tikkis until golden brown on both sides",
                            "Drain on paper towels to remove excess oil",
                            "Serve hot with tamarind chutney and yogurt"
                        ],
                        hi: [
                            "एक कटोरे में मैश किए हुए आलू, मटर, प्याज, हरी मिर्च, अदरक और मसाले मिलाएं",
                            "कॉर्नफ्लोर डालें और अच्छी तरह मिलाकर आटा बना लें",
                            "मिश्रण को बराबर भागों में विभाजित करें और गोल टिक्कियां बनाएं",
                            "एक पैन में तेल गर्म करें। टिक्कियों को दोनों तरफ से सुनहरा भूरा होने तक शैलो फ्राई करें",
                            "अतिरिक्त तेल निकालने के लिए पेपर टॉवल पर निकालें",
                            "इमली की चटनी और दही के साथ गर्म परोसें"
                        ]
                    },
                    benefits: {
                        en: "Aloo tikki provides energy from carbohydrates and protein from peas. Potatoes are rich in vitamin C and potassium. This snack is filling and provides instant energy, making it perfect for after-school hunger.",
                        hi: "आलू टिक्की कार्बोहाइड्रेट से ऊर्जा और मटर से प्रोटीन प्रदान करती है। आलू विटामिन सी और पोटेशियम से भरपूर होते हैं। यह स्नैक भरने वाला होता है और तत्काल ऊर्जा प्रदान करता है, जो इसे स्कूल के बाद की भूख के लिए परफेक्ट बनाता है।"
                    }
                },
                {
                    name: "Vegetable Samosa",
                    image: "img/vegetablesamosa.jpg",
                    ingredients: {
                        en: [
                            "For dough:",
                            "2 cups all-purpose flour",
                            "4 tbsp oil",
                            "Salt to taste",
                            "Water as needed",
                            "For filling:",
                            "3 potatoes, boiled and mashed",
                            "1/2 cup peas",
                            "1 onion, finely chopped",
                            "1 tsp ginger-garlic paste",
                            "1 tsp cumin seeds",
                            "1 tsp coriander powder",
                            "1/2 tsp garam masala",
                            "1/2 tsp amchur powder",
                            "Oil for frying"
                        ],
                        hi: [
                            "आटे के लिए:",
                            "2 कप मैदा",
                            "4 बड़े चम्मच तेल",
                            "नमक स्वादानुसार",
                            "आवश्यकतानुसार पानी",
                            "भरावन के लिए:",
                            "3 आलू, उबले और मैश किए हुए",
                            "1/2 कप मटर",
                            "1 प्याज, बारीक कटा हुआ",
                            "1 चम्मच अदरक-लहसुन पेस्ट",
                            "1 चम्मच जीरा",
                            "1 चम्मच धनिया पाउडर",
                            "1/2 चम्मच गरम मसाला",
                            "1/2 चम्मच आमचूर पाउडर",
                            "तलने के लिए तेल"
                        ]
                    },
                    steps: {
                        en: [
                            "Mix flour, salt and oil. Add water to make stiff dough. Rest for 30 minutes.",
                            "Heat oil in a pan. Add cumin seeds and onions. Sauté until golden.",
                            "Add ginger-garlic paste, peas and mashed potatoes. Cook for 5 minutes.",
                            "Add spices and mix well. Let filling cool.",
                            "Divide dough into balls. Roll into circles and cut in half.",
                            "Form cones and fill with potato mixture. Seal edges.",
                            "Deep fry until golden brown and crisp.",
                            "Serve hot with mint chutney."
                        ],
                        hi: [
                            "मैदा, नमक और तेल मिलाएं। पानी डालकर कड़ा आटा गूंथ लें। 30 मिनट रख दें।",
                            "पैन में तेल गर्म करें। जीरा और प्याज डालें। सुनहरा होने तक भूनें।",
                            "अदरक-लहसुन पेस्ट, मटर और मैश किए हुए आलू डालें। 5 मिनट तक पकाएं।",
                            "मसाले डालें और अच्छी तरह मिलाएं। भरावन को ठंडा होने दें।",
                            "आटे को गोलों में बांटें। गोल बेलें और आधा काटें।",
                            "कोन बनाएं और आलू के मिश्रण से भरें। किनारों को सील करें।",
                            "सुनहरा भूरा और कुरकुरा होने तक डीप फ्राई करें।",
                            "गर्मागर्म पुदीने की चटनी के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Samosas provide carbohydrates from the crust and protein from peas. Potatoes add potassium and vitamin C. This crispy snack is satisfying and provides instant energy for teens.",
                        hi: "समोसे क्रस्ट से कार्बोहाइड्रेट और मटर से प्रोटीन प्रदान करते हैं। आलू पोटेशियम और विटामिन सी जोड़ते हैं। यह कुरकुरा स्नैक किशोरों के लिए तत्काल ऊर्जा प्रदान करने वाला और संतोषजनक है।"
                    }
                },
                {
                    name: "Paneer Pakora",
                    image: "img/paneerpakora.jpg",
                    ingredients: {
                        en: [
                            "200g paneer, cut into cubes",
                            "1 cup besan (gram flour)",
                            "1/4 cup rice flour",
                            "1 tsp red chili powder",
                            "1/2 tsp turmeric powder",
                            "1 tsp ajwain (carom seeds)",
                            "1/4 tsp baking soda",
                            "Water as needed",
                            "Oil for frying",
                            "Salt to taste"
                        ],
                        hi: [
                            "200g पनीर, क्यूब्स में कटा हुआ",
                            "1 कप बेसन",
                            "1/4 कप चावल का आटा",
                            "1 चम्मच लाल मिर्च पाउडर",
                            "1/2 चम्मच हल्दी पाउडर",
                            "1 चम्मच अजवाइन",
                            "1/4 चम्मच बेकिंग सोडा",
                            "आवश्यकतानुसार पानी",
                            "तलने के लिए तेल",
                            "नमक स्वादानुसार"
                        ]
                    },
                    steps: {
                        en: [
                            "In a bowl, mix besan, rice flour, spices, baking soda and salt.",
                            "Add water gradually to make a thick batter.",
                            "Heat oil in a deep pan.",
                            "Dip paneer cubes in batter and deep fry until golden brown.",
                            "Drain on paper towels.",
                            "Serve hot with mint chutney."
                        ],
                        hi: [
                            "एक कटोरे में बेसन, चावल का आटा, मसाले, बेकिंग सोडा और नमक मिलाएं।",
                            "धीरे-धीरे पानी डालकर गाढ़ा घोल बना लें।",
                            "एक गहरे पैन में तेल गर्म करें।",
                            "पनीर के क्यूब्स को घोल में डुबोएं और सुनहरा भूरा होने तक डीप फ्राई करें।",
                            "पेपर टॉवल पर निकालें।",
                            "गर्मागर्म पुदीने की चटनी के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Paneer pakoras are rich in protein from paneer, essential for muscle development. Gram flour adds fiber. This crispy snack provides calcium for bone health and satisfies hunger effectively.",
                        hi: "पनीर पकोड़े पनीर से प्रोटीन से भरपूर होते हैं, जो मांसपेशियों के विकास के लिए आवश्यक है। बेसन फाइबर जोड़ता है। यह कुरकुरा स्नैक हड्डियों के स्वास्थ्य के लिए कैल्शियम प्रदान करता है और भूख को प्रभावी ढंग से संतुष्ट करता है।"
                    }
                },
                {
                    name: "Bhel Puri",
                    image: "img/bhelpuri.jpg",
                    ingredients: {
                        en: [
                            "2 cups puffed rice",
                            "1/2 cup sev",
                            "1 onion, finely chopped",
                            "1 tomato, finely chopped",
                            "1 boiled potato, diced",
                            "1/4 cup chopped coriander",
                            "2 tbsp tamarind chutney",
                            "2 tbsp green chutney",
                            "1 tsp chaat masala",
                            "1/2 tsp red chili powder",
                            "Lemon juice to taste"
                        ],
                        hi: [
                            "2 कप मुरमुरे",
                            "1/2 कप सेव",
                            "1 प्याज, बारीक कटा हुआ",
                            "1 टमाटर, बारीक कटा हुआ",
                            "1 उबला आलू, कटा हुआ",
                            "1/4 कप कटा हुआ धनिया",
                            "2 बड़े चम्मच इमली की चटनी",
                            "2 बड़े चम्मच हरी चटनी",
                            "1 चम्मच चाट मसाला",
                            "1/2 चम्मच लाल मिर्च पाउडर",
                            "स्वादानुसार नींबू का रस"
                        ]
                    },
                    steps: {
                        en: [
                            "In a large bowl, mix puffed rice, sev, onion, tomato, potato and coriander.",
                            "Add tamarind chutney, green chutney, chaat masala, red chili powder and lemon juice.",
                            "Toss gently to combine.",
                            "Serve immediately before it gets soggy."
                        ],
                        hi: [
                            "एक बड़े कटोरे में मुरमुरे, सेव, प्याज, टमाटर, आलू और धनिया मिलाएं।",
                            "इमली की चटनी, हरी चटनी, चाट मसाला, लाल मिर्च पाउडर और नींबू का रस डालें।",
                            "हल्के से टॉस करके मिलाएं।",
                            "गीला होने से पहले तुरंत परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Bhel puri is a light and tangy snack. Puffed rice provides carbohydrates while vegetables add vitamins and minerals. This low-calorie snack is great for satisfying hunger without adding extra calories.",
                        hi: "भेल पूरी एक हल्का और तीखा स्नैक है। मुरमुरे कार्बोहाइड्रेट प्रदान करते हैं जबकि सब्जियां विटामिन और खनिज जोड़ती हैं। यह कम कैलोरी वाला स्नैक अतिरिक्त कैलोरी जोड़े बिना भूख को संतुष्ट करने के लिए बहुत अच्छा है।"
                    }
                },
                {
                    name: "Pani Puri",
                    image: "img/panipuri.jpg",
                    ingredients: {
                        en: [
                            "20 puris (ready-made)",
                            "1 cup boiled potatoes, mashed",
                            "1/2 cup boiled chickpeas",
                            "1/2 cup tamarind chutney",
                            "For pani:",
                            "1 cup mint leaves",
                            "1/2 cup coriander leaves",
                            "2 green chilies",
                            "1 inch ginger",
                            "1 tsp roasted cumin powder",
                            "1/2 tsp black salt",
                            "Salt to taste",
                            "4 cups water"
                        ],
                        hi: [
                            "20 पुरियां (रेडीमेड)",
                            "1 कप उबले आलू, मैश किए हुए",
                            "1/2 कप उबले चने",
                            "1/2 कप इमली की चटनी",
                            "पानी के लिए:",
                            "1 कप पुदीना पत्तियां",
                            "1/2 कप धनिया पत्तियां",
                            "2 हरी मिर्च",
                            "1 इंच अदरक",
                            "1 चम्मच भुना जीरा पाउडर",
                            "1/2 चम्मच काला नमक",
                            "नमक स्वादानुसार",
                            "4 कप पानी"
                        ]
                    },
                    steps: {
                        en: [
                            "For pani: Blend mint, coriander, green chilies and ginger with water.",
                            "Strain and add cumin powder, black salt and salt. Refrigerate.",
                            "Make a small hole in each puri.",
                            "Fill with mashed potatoes and chickpeas.",
                            "Add a little tamarind chutney.",
                            "Dip in chilled mint water and eat immediately."
                        ],
                        hi: [
                            "पानी के लिए: पुदीना, धनिया, हरी मिर्च और अदरक को पानी के साथ ब्लेंड करें।",
                            "छान लें और जीरा पाउडर, काला नमक और नमक डालें। फ्रिज में रख दें।",
                            "प्रत्येक पुरी में एक छोटा सा छेद बनाएं।",
                            "मैश किए हुए आलू और चने से भरें।",
                            "थोड़ी सी इमली की चटनी डालें।",
                            "ठंडे पुदीने के पानी में डुबोएं और तुरंत खाएं।"
                        ]
                    },
                    benefits: {
                        en: "Pani puri provides carbohydrates from puris and protein from chickpeas. The mint water aids digestion. This popular street food is refreshing and helps beat the heat.",
                        hi: "पानी पूरी पुरियों से कार्बोहाइड्रेट और चने से प्रोटीन प्रदान करती है। पुदीने का पानी पाचन में सहायता करता है। यह लोकप्रिय स्ट्रीट फूड ताज़गी देने वाला है और गर्मी से लड़ने में मदद करता है।"
                    }
                },
                {
                    name: "Bread Pakora",
                    image: "img/breadpakora.jpg",
                    ingredients: {
                        en: [
                            "8 bread slices",
                            "For filling:",
                            "2 potatoes, boiled and mashed",
                            "1/4 cup peas",
                            "1 tsp ginger paste",
                            "1/2 tsp turmeric powder",
                            "1 tsp coriander powder",
                            "Salt to taste",
                            "For batter:",
                            "1 cup besan",
                            "1/4 tsp baking soda",
                            "1/2 tsp red chili powder",
                            "Water as needed",
                            "Oil for frying"
                        ],
                        hi: [
                            "8 ब्रेड स्लाइस",
                            "भरावन के लिए:",
                            "2 आलू, उबले और मैश किए हुए",
                            "1/4 कप मटर",
                            "1 चम्मच अदरक पेस्ट",
                            "1/2 चम्मच हल्दी पाउडर",
                            "1 चम्मच धनिया पाउडर",
                            "नमक स्वादानुसार",
                            "घोल के लिए:",
                            "1 कप बेसन",
                            "1/4 चम्मच बेकिंग सोडा",
                            "1/2 चम्मच लाल मिर्च पाउडर",
                            "आवश्यकतानुसार पानी",
                            "तलने के लिए तेल"
                        ]
                    },
                    steps: {
                        en: [
                            "Mix mashed potatoes, peas, ginger paste, spices and salt for filling.",
                            "Spread filling between two bread slices. Press edges to seal.",
                            "For batter: Mix besan, baking soda, red chili powder and salt with water to make thick batter.",
                            "Heat oil in a pan.",
                            "Dip each sandwich in batter and deep fry until golden brown.",
                            "Drain on paper towels.",
                            "Serve hot with ketchup."
                        ],
                        hi: [
                            "भरावन के लिए मैश किए हुए आलू, मटर, अदरक पेस्ट, मसाले और नमक मिलाएं।",
                            "दो ब्रेड स्लाइस के बीच भरावन फैलाएं। सील करने के लिए किनारों को दबाएं।",
                            "घोल के लिए: बेसन, बेकिंग सोडा, लाल मिर्च पाउडर और नमक पानी के साथ गाढ़ा घोल बना लें।",
                            "पैन में तेल गर्म करें।",
                            "प्रत्येक सैंडविच को घोल में डुबोएं और सुनहरा भूरा होने तक डीप फ्राई करें।",
                            "पेपर टॉवल पर निकालें।",
                            "गर्मागर्म केचप के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Bread pakoras provide carbohydrates from bread and protein from peas. The besan batter adds fiber. This crispy snack is satisfying and provides energy for after-school activities.",
                        hi: "ब्रेड पकोड़े ब्रेड से कार्बोहाइड्रेट और मटर से प्रोटीन प्रदान करते हैं। बेसन का घोल फाइबर जोड़ता है। यह कुरकुरा स्नैक स्कूल के बाद की गतिविधियों के लिए ऊर्जा प्रदान करने वाला और संतोषजनक है।"
                    }
                },
                {
                    name: "Corn Chaat",
                    image: "img/cornchaat.jpg",
                    ingredients: {
                        en: [
                            "2 cups boiled corn kernels",
                            "1 onion, finely chopped",
                            "1 tomato, finely chopped",
                            "1 green chili, finely chopped",
                            "1/4 cup chopped coriander",
                            "1 tsp chaat masala",
                            "1/2 tsp red chili powder",
                            "1/2 tsp roasted cumin powder",
                            "Lemon juice to taste",
                            "Salt to taste",
                            "Sev for garnish"
                        ],
                        hi: [
                            "2 कप उबले हुए मकई के दाने",
                            "1 प्याज, बारीक कटा हुआ",
                            "1 टमाटर, बारीक कटा हुआ",
                            "1 हरी मिर्च, बारीक कटी हुई",
                            "1/4 कप कटा हुआ धनिया",
                            "1 चम्मच चाट मसाला",
                            "1/2 चम्मच लाल मिर्च पाउडर",
                            "1/2 चम्मच भुना जीरा पाउडर",
                            "स्वादानुसार नींबू का रस",
                            "नमक स्वादानुसार",
                            "सेव गार्निश के लिए"
                        ]
                    },
                    steps: {
                        en: [
                            "In a bowl, mix boiled corn, onion, tomato, green chili and coriander.",
                            "Add chaat masala, red chili powder, cumin powder, lemon juice and salt.",
                            "Toss gently to combine.",
                            "Garnish with sev and serve immediately."
                        ],
                        hi: [
                            "एक कटोरे में उबले हुए मकई, प्याज, टमाटर, हरी मिर्च और धनिया मिलाएं।",
                            "चाट मसाला, लाल मिर्च पाउडर, जीरा पाउडर, नींबू का रस और नमक डालें।",
                            "हल्के से टॉस करके मिलाएं।",
                            "सेव से गार्निश करें और तुरंत परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Corn chaat is rich in fiber and antioxidants. Corn provides energy while vegetables add vitamins and minerals. This tangy snack aids digestion and is low in calories.",
                        hi: "कॉर्न चाट फाइबर और एंटीऑक्सिडेंट से भरपूर होती है। मकई ऊर्जा प्रदान करती है जबकि सब्जियां विटामिन और खनिज जोड़ती हैं। यह तीखा स्नैक पाचन में सहायता करता है और कैलोरी में कम है।"
                    }
                },
                {
                    name: "Paneer Tikka",
                    image: "img/paneertikka.jpg",
                    ingredients: {
                        en: [
                            "250g paneer, cut into cubes",
                            "1 capsicum, cut into squares",
                            "1 onion, cut into squares",
                            "1 tomato, cut into squares",
                            "For marinade:",
                            "1/2 cup yogurt",
                            "1 tbsp ginger-garlic paste",
                            "1 tsp red chili powder",
                            "1 tsp garam masala",
                            "1 tsp chaat masala",
                            "1 tbsp lemon juice",
                            "Salt to taste",
                            "Oil for brushing"
                        ],
                        hi: [
                            "250g पनीर, क्यूब्स में कटा हुआ",
                            "1 शिमला मिर्च, चौकोर कटी हुई",
                            "1 प्याज, चौकोर कटा हुआ",
                            "1 टमाटर, चौकोर कटा हुआ",
                            "मैरिनेड के लिए:",
                            "1/2 कप दही",
                            "1 बड़ा चम्मच अदरक-लहसुन पेस्ट",
                            "1 चम्मच लाल मिर्च पाउडर",
                            "1 चम्मच गरम मसाला",
                            "1 चम्मच चाट मसाला",
                            "1 बड़ा चम्मच नींबू का रस",
                            "नमक स्वादानुसार",
                            "ब्रश करने के लिए तेल"
                        ]
                    },
                    steps: {
                        en: [
                            "Mix all marinade ingredients in a bowl.",
                            "Add paneer and vegetables. Mix well. Marinate for 30 minutes.",
                            "Thread paneer and vegetables onto skewers.",
                            "Brush with oil and grill in oven or on tawa until charred and cooked.",
                            "Serve hot with mint chutney."
                        ],
                        hi: [
                            "एक कटोरे में सभी मैरिनेड सामग्री मिलाएं।",
                            "पनीर और सब्जियां डालें। अच्छी तरह मिलाएं। 30 मिनट के लिए मैरिनेट करें।",
                            "पनीर और सब्जियों को सीख पर थ्रेड करें।",
                            "तेल से ब्रश करें और ओवन में या तवे पर चार होने और पकने तक ग्रिल करें।",
                            "गर्मागर्म पुदीने की चटनी के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Paneer tikka is rich in protein from paneer, essential for muscle development. The grilling method makes it healthier than fried snacks. Vegetables add vitamins and fiber. This flavorful snack is both nutritious and satisfying.",
                        hi: "पनीर टिक्का पनीर से प्रोटीन से भरपूर होता है, जो मांसपेशियों के विकास के लिए आवश्यक है। ग्रिलिंग विधि इसे तले हुए स्नैक्स की तुलना में स्वास्थ्यवर्धक बनाती है। सब्जियां विटामिन और फाइबर जोड़ती हैं। यह स्वादिष्ट स्नैक पौष्टिक और संतोषजनक दोनों है।"
                    }
                },
                {
                    name: "Spring Roll",
                    image: "img/springroll.jpg",
                    ingredients: {
                        en: [
                            "10 spring roll wrappers",
                            "2 cups shredded cabbage",
                            "1 carrot, julienned",
                            "1 capsicum, julienned",
                            "1/2 cup bean sprouts",
                            "1 tbsp soy sauce",
                            "1 tbsp vinegar",
                            "1 tsp ginger-garlic paste",
                            "1 tsp red chili sauce",
                            "Salt to taste",
                            "Oil for frying"
                        ],
                        hi: [
                            "10 स्प्रिंग रोल रैपर",
                            "2 कप कटा हुआ पत्तागोभी",
                            "1 गाजर, जूलियन कटी हुई",
                            "1 शिमला मिर्च, जूलियन कटी हुई",
                            "1/2 कप अंकुरित मूंग",
                            "1 बड़ा चम्मच सोया सॉस",
                            "1 बड़ा चम्मच सिरका",
                            "1 चम्मच अदरक-लहसुन पेस्ट",
                            "1 चम्मच लाल चिली सॉस",
                            "नमक स्वादानुसार",
                            "तलने के लिए तेल"
                        ]
                    },
                    steps: {
                        en: [
                            "Heat oil in a wok. Add ginger-garlic paste and sauté.",
                            "Add vegetables and stir fry for 3-4 minutes.",
                            "Add soy sauce, vinegar, chili sauce and salt. Mix well.",
                            "Place filling on wrappers and roll tightly.",
                            "Seal edges with cornflour paste.",
                            "Deep fry until golden brown and crisp.",
                            "Serve hot with schezwan sauce."
                        ],
                        hi: [
                            "वोक में तेल गर्म करें। अदरक-लहसुन पेस्ट डालें और भूनें।",
                            "सब्जियां डालें और 3-4 मिनट तक स्टिर फ्राई करें।",
                            "सोया सॉस, सिरका, चिली सॉस और नमक डालें। अच्छी तरह मिलाएं।",
                            "रैपर पर भरावन रखें और कसकर रोल करें।",
                            "किनारों को कॉर्नफ्लोर पेस्ट से सील करें।",
                            "सुनहरा भूरा और कुरकुरा होने तक डीप फ्राई करें।",
                            "गर्मागर्म सिचुआन सॉस के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Spring rolls provide fiber from vegetables. The stir-frying method retains nutrients. This crunchy snack is low in calories and provides essential vitamins and minerals.",
                        hi: "स्प्रिंग रोल सब्जियों से फाइबर प्रदान करते हैं। स्टिर-फ्राइंग विधि पोषक तत्वों को बरकरार रखती है। यह कुरकुरा स्नैक कैलोरी में कम है और आवश्यक विटामिन और खनिज प्रदान करता है।"
                    }
                },
                {
                    name: "Vegetable Cutlet",
                    image: "img/vegetablecutlet.jpg",
                    ingredients: {
                        en: [
                            "2 potatoes, boiled and mashed",
                            "1/2 cup mixed vegetables (carrots, peas, beans), boiled",
                            "1 onion, finely chopped",
                            "2 green chilies, finely chopped",
                            "1 tbsp ginger-garlic paste",
                            "1 tsp garam masala",
                            "1/2 tsp turmeric powder",
                            "2 tbsp coriander leaves, chopped",
                            "Bread crumbs for coating",
                            "Oil for shallow frying",
                            "Salt to taste"
                        ],
                        hi: [
                            "2 आलू, उबले और मैश किए हुए",
                            "1/2 कप मिश्रित सब्जियां (गाजर, मटर, बीन्स), उबली हुई",
                            "1 प्याज, बारीक कटा हुआ",
                            "2 हरी मिर्च, बारीक कटी हुई",
                            "1 बड़ा चम्मच अदरक-लहसुन पेस्ट",
                            "1 चम्मच गरम मसाला",
                            "1/2 चम्मच हल्दी पाउडर",
                            "2 बड़े चम्मच धनिया पत्ती, कटी हुई",
                            "कोटिंग के लिए ब्रेड क्रम्ब्स",
                            "शैलो फ्राइंग के लिए तेल",
                            "नमक स्वादानुसार"
                        ]
                    },
                    steps: {
                        en: [
                            "Mix mashed potatoes, vegetables, onion, green chilies, ginger-garlic paste, spices and salt.",
                            "Shape into cutlets.",
                            "Coat with bread crumbs.",
                            "Shallow fry in oil until golden brown on both sides.",
                            "Serve hot with ketchup."
                        ],
                        hi: [
                            "मैश किए हुए आलू, सब्जियां, प्याज, हरी मिर्च, अदरक-लहसुन पेस्ट, मसाले और नमक मिलाएं।",
                            "कटलेट का आकार दें।",
                            "ब्रेड क्रम्ब्स से कोट करें।",
                            "तेल में दोनों तरफ से सुनहरा भूरा होने तक शैलो फ्राई करें।",
                            "गर्मागर्म केचप के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Vegetable cutlets provide fiber and vitamins from vegetables. Potatoes add potassium. This crispy snack is satisfying and provides energy for teens during study sessions.",
                        hi: "वेजिटेबल कटलेट सब्जियों से फाइबर और विटामिन प्रदान करते हैं। आलू पोटेशियम जोड़ते हैं। यह कुरकुरा स्नैक अध्ययन सत्र के दौरान किशोरों के लिए ऊर्जा प्रदान करने वाला और संतोषजनक है।"
                    }
                }
            ],
            dinner: [
                {
                    name: "Vegetable Pulao",
                    image: "img/vegetablepulao.jpg",
                    ingredients: {
                        en: [
                            "1 cup basmati rice, soaked for 30 minutes",
                            "1 cup mixed vegetables (carrots, peas, beans, cauliflower)",
                            "1 onion, sliced",
                            "1 tomato, chopped",
                            "2 green chilies, slit",
                            "1 tbsp ginger-garlic paste",
                            "1 tsp cumin seeds",
                            "2 cloves",
                            "1-inch cinnamon stick",
                            "2 cardamom pods",
                            "1/2 cup mint leaves",
                            "2 tbsp oil or ghee",
                            "Salt to taste",
                            "2 cups water"
                        ],
                        hi: [
                            "1 कप बासमती चावल, 30 मिनट के लिए भिगोएँ",
                            "1 कप मिश्रित सब्जियां (गाजर, मटर, बीन्स, फूलगोभी)",
                            "1 प्याज, कटा हुआ",
                            "1 टमाटर, कटा हुआ",
                            "2 हरी मिर्च, चीरा लगा हुआ",
                            "1 बड़ा चम्मच अदरक-लहसुन पेस्ट",
                            "1 चम्मच जीरा",
                            "2 लौंग",
                            "1 इंच दालचीनी का टुकड़ा",
                            "2 इलायची",
                            "1/2 कप पुदीना पत्तियां",
                            "2 बड़े चम्मच तेल या घी",
                            "नमक स्वादानुसार",
                            "2 कप पानी"
                        ]
                    },
                    steps: {
                        en: [
                            "Heat oil/ghee in a pressure cooker. Add whole spices and cumin seeds. Sauté until fragrant",
                            "Add sliced onions and sauté until golden brown",
                            "Add ginger-garlic paste and green chilies. Sauté for 2 minutes",
                            "Add tomatoes and cook until soft",
                            "Add mixed vegetables and sauté for 3-4 minutes",
                            "Drain soaked rice and add to the cooker. Gently mix",
                            "Add water, salt, and mint leaves. Stir well",
                            "Close the lid and cook for 2 whistles on medium flame",
                            "Let pressure release naturally. Fluff the rice with a fork",
                            "Serve hot with raita or curry"
                        ],
                        hi: [
                            "प्रेशर कुकर में तेल/घी गर्म करें। साबुत मसाले और जीरा डालें। सुगंध आने तक भूनें",
                            "कटा हुआ प्याज डालें और सुनहरा होने तक भूनें",
                            "अदरक-लहसुन पेस्ट और हरी मिर्च डालें। 2 मिनट तक भूनें",
                            "टमाटर डालें और नरम होने तक पकाएं",
                            "मिश्रित सब्जियां डालें और 3-4 मिनट तक भूनें",
                            "भीगे हुए चावल को निकालें और कुकर में डालें। हल्के हाथ से मिलाएं",
                            "पानी, नमक और पुदीना पत्तियां डालें। अच्छी तरह हिलाएं",
                            "ढक्कन बंद करें और मध्यम आंच पर 2 सीटी आने तक पकाएं",
                            "प्रेशर अपने आप रिलीज होने दें। कांटे से चावल को फ्लफ करें",
                            "रायता या करी के साथ गर्म परोसें"
                        ]
                    },
                    benefits: {
                        en: "Vegetable pulao is a balanced meal with carbohydrates from rice, fiber and vitamins from vegetables, and protein from peas. The spices aid digestion and boost metabolism. It's a light yet nutritious dinner option.",
                        hi: "वेजिटेबल पुलाव चावल से कार्बोहाइड्रेट, सब्जियों से फाइबर और विटामिन, और मटर से प्रोटीन के साथ एक संतुलित भोजन है। मसाले पाचन में सहायता करते हैं और चयापचय को बढ़ावा देते हैं। यह एक हल्का लेकिन पौष्टिक डिनर विकल्प है।"
                    }
                },
                {
                    name: "Dal Tadka with Rice",
                    image: "img/daltadkawithrice.jpg",
                    ingredients: {
                        en: [
                            "1 cup yellow moong dal",
                            "1 tomato, chopped",
                            "1 onion, chopped",
                            "1 green chili, slit",
                            "1/2 tsp turmeric powder",
                            "Salt to taste",
                            "For tadka:",
                            "2 tbsp ghee",
                            "1 tsp cumin seeds",
                            "1 tsp mustard seeds",
                            "2 dry red chilies",
                            "2 garlic cloves, crushed",
                            "Few curry leaves",
                            "Cooked rice for serving"
                        ],
                        hi: [
                            "1 कप पीली मूंग दाल",
                            "1 टमाटर, कटा हुआ",
                            "1 प्याज, कटा हुआ",
                            "1 हरी मिर्च, चीरी हुई",
                            "1/2 चम्मच हल्दी पाउडर",
                            "नमक स्वादानुसार",
                            "तड़के के लिए:",
                            "2 बड़े चम्मच घी",
                            "1 चम्मच जीरा",
                            "1 चम्मच राई के दाने",
                            "2 सूखी लाल मिर्च",
                            "2 लहसुन की कलियाँ, कुचली हुई",
                            "कुछ करी पत्ते",
                            "पक्के हुए चावल परोसने के लिए"
                        ]
                    },
                    steps: {
                        en: [
                            "Pressure cook dal with turmeric and salt until soft.",
                            "Heat ghee in a pan. Add cumin and mustard seeds. Let them splutter.",
                            "Add red chilies, garlic and curry leaves. Sauté until fragrant.",
                            "Add onions and sauté until golden.",
                            "Add tomatoes and cook until soft.",
                            "Add cooked dal and simmer for 5 minutes.",
                            "Serve hot with rice."
                        ],
                        hi: [
                            "दाल को हल्दी और नमक के साथ नरम होने तक प्रेशर कुक करें।",
                            "पैन में घी गर्म करें। जीरा और राई डालें। चटकने दें।",
                            "लाल मिर्च, लहसुन और करी पत्ते डालें। सुगंध आने तक भूनें।",
                            "प्याज डालें और सुनहरा होने तक भूनें।",
                            "टमाटर डालें और नरम होने तक पकाएं।",
                            "पकी हुई दाल डालें और 5 मिनट तक उबालें।",
                            "गर्मागर्म चावल के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Moong dal is rich in protein and easy to digest. The tempering with ghee enhances flavor and aids digestion. Combined with rice, it provides a complete protein profile and sustained energy.",
                        hi: "मूंग दाल प्रोटीन से भरपूर और पचने में आसान है। घी के साथ तड़का स्वाद बढ़ाता है और पाचन में सहायता करता है। चावल के साथ संयुक्त, यह एक पूर्ण प्रोटीन प्रोफ़ाइल और सतत ऊर्जा प्रदान करता है।"
                    }
                },
                {
                    name: "Vegetable Khichdi",
                    image: "img/vegetablekhichdi.jpg",
                    ingredients: {
                        en: [
                            "1/2 cup rice",
                            "1/2 cup moong dal",
                            "1/2 cup mixed vegetables (carrots, peas, beans)",
                            "1 onion, chopped",
                            "1 tomato, chopped",
                            "1 tsp ginger-garlic paste",
                            "1 tsp cumin seeds",
                            "1/2 tsp turmeric powder",
                            "1 tsp ghee",
                            "Salt to taste",
                            "3 cups water"
                        ],
                        hi: [
                            "1/2 कप चावल",
                            "1/2 कप मूंग दाल",
                            "1/2 कप मिश्रित सब्जियां (गाजर, मटर, बीन्स)",
                            "1 प्याज, कटा हुआ",
                            "1 टमाटर, कटा हुआ",
                            "1 चम्मच अदरक-लहसुन पेस्ट",
                            "1 चम्मच जीरा",
                            "1/2 चम्मच हल्दी पाउडर",
                            "1 चम्मच घी",
                            "नमक स्वादानुसार",
                            "3 कप पानी"
                        ]
                    },
                    steps: {
                        en: [
                            "Wash rice and dal together. Soak for 15 minutes.",
                            "Heat ghee in a pressure cooker. Add cumin seeds and let them splutter.",
                            "Add onions and sauté until translucent.",
                            "Add ginger-garlic paste and sauté for 1 minute.",
                            "Add tomatoes and cook until soft.",
                            "Add vegetables, rice, dal, turmeric and salt. Mix well.",
                            "Add water and pressure cook for 3 whistles.",
                            "Serve hot with yogurt or pickle."
                        ],
                        hi: [
                            "चावल और दाल को एक साथ धोएं। 15 मिनट के लिए भिगोएँ।",
                            "प्रेशर कुकर में घी गर्म करें। जीरा डालें और चटकने दें।",
                            "प्याज डालें और पारदर्शी होने तक भूनें।",
                            "अदरक-लहसुन पेस्ट डालें और 1 मिनट तक भूनें।",
                            "टमाटर डालें और नरम होने तक पकाएं।",
                            "सब्जियां, चावल, दाल, हल्दी और नमक डालें। अच्छी तरह मिलाएं।",
                            "पानी डालें और 3 सीटी आने तक प्रेशर कुक करें।",
                            "गर्मागर्म दही या अचार के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Khichdi is a complete meal providing carbohydrates, protein, and fiber. It's easy to digest and gentle on the stomach. This comforting dish is perfect for dinner and helps in detoxification.",
                        hi: "खिचड़ी कार्बोहाइड्रेट, प्रोटीन और फाइबर प्रदान करने वाला एक संपूर्ण भोजन है। यह पचने में आसान और पेट के लिए हल्का है। यह आरामदायक व्यंजन डिनर के लिए परफेक्ट है और डिटॉक्सिफिकेशन में मदद करता है।"
                    }
                },
                {
                    name: "Paneer Paratha",
                    image: "img/paneerparatha.jpg",
                    ingredients: {
                        en: [
                            "2 cups whole wheat flour",
                            "200g paneer, grated",
                            "1 onion, finely chopped",
                            "1 green chili, finely chopped",
                            "2 tbsp coriander leaves, chopped",
                            "1/2 tsp garam masala",
                            "Salt to taste",
                            "Water as needed",
                            "Ghee for cooking"
                        ],
                        hi: [
                            "2 कप गेहूं का आटा",
                            "200g पनीर, कद्दूकस किया हुआ",
                            "1 प्याज, बारीक कटा हुआ",
                            "1 हरी मिर्च, बारीक कटी हुई",
                            "2 बड़े चम्मच धनिया पत्ती, कटी हुई",
                            "1/2 चम्मच गरम मसाला",
                            "नमक स्वादानुसार",
                            "आवश्यकतानुसार पानी",
                            "पकाने के लिए घी"
                        ]
                    },
                    steps: {
                        en: [
                            "Mix flour, salt and water to make soft dough. Rest for 15 minutes.",
                            "Mix paneer, onion, green chili, coriander, garam masala and salt for filling.",
                            "Divide dough and filling into equal portions.",
                            "Roll a dough ball, place filling, seal and roll out carefully.",
                            "Cook on hot tawa with ghee until golden brown on both sides.",
                            "Serve hot with yogurt or pickle."
                        ],
                        hi: [
                            "आटा, नमक और पानी मिलाकर नरम आटा गूंथ लें। 15 मिनट रख दें।",
                            "भरावन के लिए पनीर, प्याज, हरी मिर्च, धनिया, गरम मसाला और नमक मिलाएं।",
                            "आटे और भरावन को बराबर भागों में बांटें।",
                            "आटे की लोई बेलें, भरावन रखें, बंद करें और धीरे से बेलें।",
                            "गरम तवे पर घी डालकर दोनों तरफ सुनहरा होने तक पकाएं।",
                            "गर्मागर्म दही या अचार के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Paneer paratha provides protein from paneer and carbohydrates from whole wheat. This balanced meal helps in muscle development and provides sustained energy. The fiber aids digestion.",
                        hi: "पनीर पराठा पनीर से प्रोटीन और गेहूं से कार्बोहाइड्रेट प्रदान करता है। यह संतुलित भोजन मांसपेशियों के विकास में मदद करता है और सतत ऊर्जा प्रदान करता है। फाइबर पाचन में सहायता करता है।"
                    }
                },
                {
                    name: "Chana Masala with Roti",
                    image: "img/chanamasalawithroti.jpg",
                    ingredients: {
                        en: [
                            "1 cup chickpeas (chana), soaked overnight",
                            "2 onions, chopped",
                            "2 tomatoes, pureed",
                            "1 tbsp ginger-garlic paste",
                            "1 tsp cumin seeds",
                            "1 tbsp chana masala",
                            "1/2 tsp turmeric powder",
                            "1/2 tsp red chili powder",
                            "2 tbsp oil",
                            "Salt to taste",
                            "Fresh coriander for garnish"
                        ],
                        hi: [
                            "1 कप छोले, रात भर भिगोए हुए",
                            "2 प्याज, कटा हुआ",
                            "2 टमाटर, प्यूरी किया हुआ",
                            "1 बड़ा चम्मच अदरक-लहसुन पेस्ट",
                            "1 चम्मच जीरा",
                            "1 बड़ा चम्मच छोले मसाला",
                            "1/2 चम्मच हल्दी पाउडर",
                            "1/2 चम्मच लाल मिर्च पाउडर",
                            "2 बड़े चम्मच तेल",
                            "नमक स्वादानुसार",
                            "ताजा धनिया गार्निश के लिए"
                        ]
                    },
                    steps: {
                        en: [
                            "Pressure cook chickpeas until soft. Drain and set aside.",
                            "Heat oil in a pan. Add cumin seeds and let them splutter.",
                            "Add onions and sauté until golden brown.",
                            "Add ginger-garlic paste and sauté for 2 minutes.",
                            "Add tomato puree and cook until oil separates.",
                            "Add spices and cooked chickpeas. Simmer for 10 minutes.",
                            "Garnish with fresh coriander. Serve hot with roti."
                        ],
                        hi: [
                            "छोले को नरम होने तक प्रेशर कुक करें। निथार कर अलग रख दें।",
                            "पैन में तेल गर्म करें। जीरा डालें और चटकने दें।",
                            "प्याज डालें और सुनहरा होने तक भूनें।",
                            "अदरक-लहसुन पेस्ट डालें और 2 मिनट तक भूनें।",
                            "टमाटर प्यूरी डालें और तेल अलग होने तक पकाएं।",
                            "मसाले और पके हुए छोले डालें। 10 मिनट तक उबालें।",
                            "ताजा धनिया से गार्निश करें। गर्मागर्म रोटी के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Chickpeas are rich in protein and fiber, essential for muscle growth and digestion. The spices aid in digestion and boost metabolism. This protein-rich dinner is satisfying and nutritious.",
                        hi: "छोले प्रोटीन और फाइबर से भरपूर होते हैं, जो मांसपेशियों के विकास और पाचन के लिए आवश्यक हैं। मसाले पाचन में सहायता करते हैं और चयापचय को बढ़ावा देते हैं। यह प्रोटीन से भरपूर डिनर संतोषजनक और पौष्टिक है।"
                    }
                },
                {
                    name: "Vegetable Noodles",
                    image: "img/vegetablenoodles.jpg",
                    ingredients: {
                        en: [
                            "200g noodles",
                            "1 cup mixed vegetables (carrots, capsicum, cabbage)",
                            "1 onion, sliced",
                            "2 garlic cloves, minced",
                            "1 tbsp soy sauce",
                            "1 tbsp vinegar",
                            "1 tsp red chili sauce",
                            "2 tbsp oil",
                            "Salt to taste",
                            "Spring onions for garnish"
                        ],
                        hi: [
                            "200g नूडल्स",
                            "1 कप मिश्रित सब्जियां (गाजर, शिमला मिर्च, पत्तागोभी)",
                            "1 प्याज, कटा हुआ",
                            "2 लहसुन की कलियाँ, बारीक कटी हुई",
                            "1 बड़ा चम्मच सोया सॉस",
                            "1 बड़ा चम्मच सिरका",
                            "1 चम्मच लाल चिली सॉस",
                            "2 बड़े चम्मच तेल",
                            "नमक स्वादानुसार",
                            "गार्निश के लिए स्प्रिंग अनियन"
                        ]
                    },
                    steps: {
                        en: [
                            "Boil noodles according to package instructions. Drain and set aside.",
                            "Heat oil in a wok. Add garlic and sauté for 30 seconds.",
                            "Add onions and sauté until translucent.",
                            "Add vegetables and stir fry for 3-4 minutes.",
                            "Add soy sauce, vinegar, chili sauce and salt. Mix well.",
                            "Add boiled noodles and toss to combine.",
                            "Garnish with spring onions. Serve hot."
                        ],
                        hi: [
                            "पैकेज निर्देशों के अनुसार नूडल्स उबालें। निथार कर अलग रख दें।",
                            "वोक में तेल गर्म करें। लहसुन डालें और 30 सेकंड तक भूनें।",
                            "प्याज डालें और पारदर्शी होने तक भूनें।",
                            "सब्जियां डालें और 3-4 मिनट तक स्टिर फ्राई करें।",
                            "सोया सॉस, सिरका, चिली सॉस और नमक डालें। अच्छी तरह मिलाएं।",
                            "उबले हुए नूडल्स डालें और मिलाने के लिए टॉस करें।",
                            "स्प्रिंग अनियन से गार्निश करें। गर्मागर्म परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Vegetable noodles provide carbohydrates for energy and vegetables add vitamins and fiber. This quick meal is satisfying and helps in meeting daily vegetable intake requirements.",
                        hi: "वेजिटेबल नूडल्स ऊर्जा के लिए कार्बोहाइड्रेट प्रदान करते हैं और सब्जियां विटामिन और फाइबर जोड़ती हैं। यह त्वरित भोजन संतोषजनक है और दैनिक सब्जी सेवन आवश्यकताओं को पूरा करने में मदद करता है।"
                    }
                },
                {
                    name: "Malai Kofta",
                    image: "img/malaikofta.jpg",
                    ingredients: {
                        en: [
                            "For koftas:",
                            "3 potatoes, boiled and mashed",
                            "1/2 cup paneer, grated",
                            "2 tbsp cornflour",
                            "Salt to taste",
                            "Oil for frying",
                            "For gravy:",
                            "2 onions, chopped",
                            "2 tomatoes, chopped",
                            "10 cashews, soaked",
                            "1 tbsp ginger-garlic paste",
                            "1 tsp garam masala",
                            "1/2 cup cream",
                            "2 tbsp oil",
                            "Salt to taste"
                        ],
                        hi: [
                            "कोफ्ता के लिए:",
                            "3 आलू, उबले और मैश किए हुए",
                            "1/2 कप पनीर, कद्दूकस किया हुआ",
                            "2 बड़े चम्मच कॉर्नफ्लोर",
                            "नमक स्वादानुसार",
                            "तलने के लिए तेल",
                            "ग्रेवी के लिए:",
                            "2 प्याज, कटा हुआ",
                            "2 टमाटर, कटा हुआ",
                            "10 काजू, भिगोए हुए",
                            "1 बड़ा चम्मच अदरक-लहसुन पेस्ट",
                            "1 चम्मच गरम मसाला",
                            "1/2 कप क्रीम",
                            "2 बड़े चम्मच तेल",
                            "नमक स्वादानुसार"
                        ]
                    },
                    steps: {
                        en: [
                            "Mix mashed potatoes, paneer, cornflour and salt for koftas.",
                            "Shape into balls and deep fry until golden. Set aside.",
                            "For gravy: Sauté onions until golden. Add ginger-garlic paste and tomatoes. Cook until soft.",
                            "Add cashews and blend to smooth paste.",
                            "Heat oil in a pan. Add the paste and cook for 5 minutes.",
                            "Add garam masala, salt and cream. Simmer for 5 minutes.",
                            "Add koftas just before serving. Serve hot with naan or rice."
                        ],
                        hi: [
                            "कोफ्ता के लिए मैश किए हुए आलू, पनीर, कॉर्नफ्लोर और नमक मिलाएं।",
                            "गोलियां बनाएं और सुनहरा होने तक डीप फ्राई करें। अलग रख दें।",
                            "ग्रेवी के लिए: प्याज को सुनहरा होने तक भूनें। अदरक-लहसुन पेस्ट और टमाटर डालें। नरम होने तक पकाएं।",
                            "काजू डालें और चिकना पेस्ट ब्लेंड कर लें।",
                            "पैन में तेल गर्म करें। पेस्ट डालें और 5 मिनट तक पकाएं।",
                            "गरम मसाला, नमक और क्रीम डालें। 5 मिनट तक उबालें।",
                            "परोसने से ठीक पहले कोफ्ता डालें। गर्मागर्म नान या चावल के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Malai kofta is rich in protein from paneer and calcium from cream. Potatoes provide potassium. This rich dish is satisfying and provides essential nutrients for growing teenagers.",
                        hi: "मलाई कोफ्ता पनीर से प्रोटीन और क्रीम से कैल्शियम से भरपूर होता है। आलू पोटेशियम प्रदान करते हैं। यह समृद्ध व्यंजन बढ़ते किशोरों के लिए आवश्यक पोषक तत्व प्रदान करने वाला और संतोषजनक है।"
                    }
                },
                {
                    name: "Matar Paneer",
                    image: "img/matarpaneer.jpg",
                    ingredients: {
                        en: [
                            "200g paneer, cubed",
                            "1 cup green peas",
                            "1 onion, chopped",
                            "2 tomatoes, pureed",
                            "1 tbsp ginger-garlic paste",
                            "1 tsp cumin seeds",
                            "1 tsp turmeric powder",
                            "1 tsp coriander powder",
                            "1/2 tsp garam masala",
                            "2 tbsp oil",
                            "Salt to taste",
                            "Fresh coriander for garnish"
                        ],
                        hi: [
                            "200g पनीर, क्यूब्स में कटा हुआ",
                            "1 कप हरी मटर",
                            "1 प्याज, कटा हुआ",
                            "2 टमाटर, प्यूरी किया हुआ",
                            "1 बड़ा चम्मच अदरक-लहसुन पेस्ट",
                            "1 चम्मच जीरा",
                            "1 चम्मच हल्दी पाउडर",
                            "1 चम्मच धनिया पाउडर",
                            "1/2 चम्मच गरम मसाला",
                            "2 बड़े चम्मच तेल",
                            "नमक स्वादानुसार",
                            "ताजा धनिया गार्निश के लिए"
                        ]
                    },
                    steps: {
                        en: [
                            "Heat oil in a pan. Add cumin seeds and let them splutter.",
                            "Add onions and sauté until golden.",
                            "Add ginger-garlic paste and sauté for 2 minutes.",
                            "Add tomato puree and cook until oil separates.",
                            "Add spices and salt. Cook for 2 minutes.",
                            "Add peas and paneer. Simmer for 10 minutes.",
                            "Garnish with fresh coriander. Serve hot with roti or rice."
                        ],
                        hi: [
                            "पैन में तेल गर्म करें। जीरा डालें और चटकने दें।",
                            "प्याज डालें और सुनहरा होने तक भूनें।",
                            "अदरक-लहसुन पेस्ट डालें और 2 मिनट तक भूनें।",
                            "टमाटर प्यूरी डालें और तेल अलग होने तक पकाएं।",
                            "मसाले और नमक डालें। 2 मिनट तक पकाएं।",
                            "मटर और पनीर डालें। 10 मिनट तक उबालें।",
                            "ताजा धनिया से गार्निश करें। गर्मागर्म रोटी या चावल के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Matar paneer is rich in protein from paneer and peas. Peas add fiber and vitamins. This nutritious dish provides calcium for bones and protein for muscle development.",
                        hi: "मटर पनीर पनीर और मटर से प्रोटीन से भरपूर होता है। मटर फाइबर और विटामिन जोड़ते हैं। यह पौष्टिक व्यंजन हड्डियों के लिए कैल्शियम और मांसपेशियों के विकास के लिए प्रोटीन प्रदान करता है।"
                    }
                },
                {
                    name: "Vegetable Fried Rice",
                    image: "img/vegetablefriedrice.jpg",
                    ingredients: {
                        en: [
                            "2 cups cooked rice (preferably cold)",
                            "1 cup mixed vegetables (carrots, beans, peas, corn)",
                            "1 onion, chopped",
                            "2 garlic cloves, minced",
                            "2 tbsp soy sauce",
                            "1 tbsp vinegar",
                            "1 tsp pepper powder",
                            "2 tbsp oil",
                            "Salt to taste",
                            "Spring onions for garnish"
                        ],
                        hi: [
                            "2 कप पके हुए चावल (अधिमानतः ठंडे)",
                            "1 कप मिश्रित सब्जियां (गाजर, बीन्स, मटर, मकई)",
                            "1 प्याज, कटा हुआ",
                            "2 लहसुन की कलियाँ, बारीक कटी हुई",
                            "2 बड़े चम्मच सोया सॉस",
                            "1 बड़ा चम्मच सिरका",
                            "1 चम्मच काली मिर्च पाउडर",
                            "2 बड़े चम्मच तेल",
                            "नमक स्वादानुसार",
                            "गार्निश के लिए स्प्रिंग अनियन"
                        ]
                    },
                    steps: {
                        en: [
                            "Heat oil in a wok. Add garlic and sauté for 30 seconds.",
                            "Add onions and sauté until translucent.",
                            "Add vegetables and stir fry for 3-4 minutes.",
                            "Add soy sauce, vinegar, pepper and salt. Mix well.",
                            "Add cooked rice and toss to combine.",
                            "Garnish with spring onions. Serve hot."
                        ],
                        hi: [
                            "वोक में तेल गर्म करें। लहसुन डालें और 30 सेकंड तक भूनें।",
                            "प्याज डालें और पारदर्शी होने तक भूनें।",
                            "सब्जियां डालें और 3-4 मिनट तक स्टिर फ्राई करें।",
                            "सोया सॉस, सिरका, काली मिर्च और नमक डालें। अच्छी तरह मिलाएं।",
                            "पके हुए चावल डालें और मिलाने के लिए टॉस करें।",
                            "स्प्रिंग अनियन से गार्निश करें। गर्मागर्म परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Vegetable fried rice provides carbohydrates for energy and vegetables add vitamins and fiber. This quick meal is satisfying and helps in meeting daily vegetable intake requirements.",
                        hi: "वेजिटेबल फ्राइड राइस ऊर्जा के लिए कार्बोहाइड्रेट प्रदान करती है और सब्जियां विटामिन और फाइबर जोड़ती हैं। यह त्वरित भोजन संतोषजनक है और दैनिक सब्जी सेवन आवश्यकताओं को पूरा करने में मदद करता है।"
                    }
                },
                {
                    name: "Aloo Gobi",
                    image: "img/aloogobi.jpg",
                    ingredients: {
                        en: [
                            "1 cauliflower, cut into florets",
                            "2 potatoes, cubed",
                            "1 onion, chopped",
                            "2 tomatoes, chopped",
                            "1 tbsp ginger-garlic paste",
                            "1 tsp cumin seeds",
                            "1 tsp turmeric powder",
                            "1 tsp coriander powder",
                            "1/2 tsp garam masala",
                            "2 tbsp oil",
                            "Salt to taste",
                            "Fresh coriander for garnish"
                        ],
                        hi: [
                            "1 फूलगोभी, फूलों में कटी हुई",
                            "2 आलू, क्यूब्स में कटे हुए",
                            "1 प्याज, कटा हुआ",
                            "2 टमाटर, कटा हुआ",
                            "1 बड़ा चम्मच अदरक-लहसुन पेस्ट",
                            "1 चम्मच जीरा",
                            "1 चम्मच हल्दी पाउडर",
                            "1 चम्मच धनिया पाउडर",
                            "1/2 चम्मच गरम मसाला",
                            "2 बड़े चम्मच तेल",
                            "नमक स्वादानुसार",
                            "ताजा धनिया गार्निश के लिए"
                        ]
                    },
                    steps: {
                        en: [
                            "Heat oil in a pan. Add cumin seeds and let them splutter.",
                            "Add onions and sauté until golden.",
                            "Add ginger-garlic paste and sauté for 2 minutes.",
                            "Add tomatoes and cook until soft.",
                            "Add spices and salt. Cook for 2 minutes.",
                            "Add potatoes and cauliflower. Mix well.",
                            "Cover and cook on low heat until vegetables are tender.",
                            "Garnish with fresh coriander. Serve hot with roti."
                        ],
                        hi: [
                            "पैन में तेल गर्म करें। जीरा डालें और चटकने दें।",
                            "प्याज डालें और सुनहरा होने तक भूनें।",
                            "अदरक-लहसुन पेस्ट डालें और 2 मिनट तक भूनें।",
                            "टमाटर डालें और नरम होने तक पकाएं।",
                            "मसाले और नमक डालें। 2 मिनट तक पकाएं।",
                            "आलू और फूलगोभी डालें। अच्छी तरह मिलाएं।",
                            "ढककर धीमी आंच पर तब तक पकाएं जब तक सब्जियां नरम न हो जाएं।",
                            "ताजा धनिया से गार्निश करें। गर्मागर्म रोटी के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Aloo gobi provides vitamins from cauliflower and potassium from potatoes. Cauliflower is rich in antioxidants. This simple dish is light on the stomach and easy to digest.",
                        hi: "आलू गोभी फूलगोभी से विटामिन और आलू से पोटेशियम प्रदान करती है। फूलगोभी एंटीऑक्सिडेंट से भरपूर होती है। यह सरल व्यंजन पेट पर हल्का और पचने में आसान है।"
                    }
                }
            ]
        };

        // DOM Elements
        const recipeDisplay = document.getElementById('recipeDisplay');
        const recipeTitle = document.getElementById('recipeTitle');
        const recipeImage = document.getElementById('recipeImage');
        const ingredientsListEn = document.getElementById('ingredientsListEn');
        const ingredientsListHi = document.getElementById('ingredientsListHi');
        const stepsListEn = document.getElementById('stepsListEn');
        const stepsListHi = document.getElementById('stepsListHi');
        const benefitsTextEn = document.getElementById('benefitsTextEn');
        const benefitsTextHi = document.getElementById('benefitsTextHi');
        const randomBtn = document.getElementById('randomBtn');
        const autoBtn = document.getElementById('autoBtn');
        const timerDisplay = document.getElementById('timerDisplay');
        const categoryLabel = document.getElementById('categoryLabel');
        const contentEn = document.getElementById('content-en');
        const contentHi = document.getElementById('content-hi');
        
        // Current state
        let currentCategory = '';
        let autoInterval = null;
        let countdown = 5;
        
        // Display a random recipe from the current category
        function showRandomRecipe() {
            if (!currentCategory) return;
            
            const categoryRecipes = recipes[currentCategory];
            if (categoryRecipes.length === 0) return;
            
            const randomIndex = Math.floor(Math.random() * categoryRecipes.length);
            const recipe = categoryRecipes[randomIndex];
            
            displayRecipe(recipe);
        }
        
        // Display a specific recipe
        function displayRecipe(recipe) {
            recipeTitle.textContent = recipe.name;
            recipeImage.src = recipe.image;
            recipeImage.alt = recipe.name;
            
            // Set category label
            categoryLabel.textContent = currentCategory.charAt(0).toUpperCase() + currentCategory.slice(1);
            
            // Display ingredients
            displayList(ingredientsListEn, recipe.ingredients.en);
            displayList(ingredientsListHi, recipe.ingredients.hi);
            
            // Display steps
            displayList(stepsListEn, recipe.steps.en, 'ol');
            displayList(stepsListHi, recipe.steps.hi, 'ol');
            
            // Display benefits
            benefitsTextEn.textContent = recipe.benefits.en;
            benefitsTextHi.textContent = recipe.benefits.hi;
            
            // Show the recipe display area
            recipeDisplay.style.display = 'block';
        }
        
        // Helper function to display list items
        function displayList(container, items, type = 'ul') {
            container.innerHTML = '';
            items.forEach(item => {
                const li = document.createElement('li');
                li.textContent = item;
                container.appendChild(li);
            });
        }
        
        // Update timer display
        function updateTimer() {
            timerDisplay.textContent = `${countdown}s`;
            timerDisplay.style.display = 'block';
            countdown--;
            
            if (countdown < 0) {
                countdown = 5;
                showRandomRecipe();
            }
        }
        
        // Toggle auto generate
        function toggleAutoGenerate() {
            if (autoInterval) {
                clearInterval(autoInterval);
                autoInterval = null;
                countdown = 5;
                timerDisplay.style.display = 'none';
                autoBtn.innerHTML = '<i class="fas fa-sync"></i> Auto Generate';
            } else {
                autoInterval = setInterval(updateTimer, 1000);
                autoBtn.innerHTML = '<i class="fas fa-stop"></i> Stop Auto';
                timerDisplay.style.display = 'block';
                updateTimer();
            }
        }
        
        // Set up language tabs
        function setupLangTabs() {
            document.querySelectorAll('.lang-tab').forEach(tab => {
                tab.addEventListener('click', function() {
                    const lang = this.getAttribute('data-lang');
                    
                    // Remove active class from all tabs
                    document.querySelectorAll('.lang-tab').forEach(t => {
                        t.classList.remove('active');
                    });
                    
                    // Add active class to clicked tab
                    this.classList.add('active');
                    
                    // Hide all language content
                    document.querySelectorAll('.lang-content').forEach(content => {
                        content.classList.remove('active');
                    });
                    
                    // Show selected language content
                    document.getElementById(`content-${lang}`).classList.add('active');
                });
            });
        }
        
        // Initialize the app
        function init() {
            setupLangTabs();
            
            // Category button event listeners
            document.querySelectorAll('.category-btn').forEach(button => {
                button.addEventListener('click', function() {
                    currentCategory = this.getAttribute('data-category');
                    showRandomRecipe();
                    
                    // Stop auto generate when switching categories
                    if (autoInterval) {
                        toggleAutoGenerate();
                    }
                });
            });
            
            // Random button event listener
            randomBtn.addEventListener('click', showRandomRecipe);
            
            // Auto button event listener
            autoBtn.addEventListener('click', toggleAutoGenerate);
            
            // Show breakfast recipes by default
            document.querySelector('.breakfast-btn').click();
        }
        
        // Start the app
        window.addEventListener('DOMContentLoaded', init);
    </script>
</body>
</html>