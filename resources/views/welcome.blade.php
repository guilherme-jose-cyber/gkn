<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .login-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        .links {
            margin-top: 10px;
        }
        .links a {
            text-decoration: none;
            color: #007bff;
        }
        .links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <input type="email" id="email" placeholder="Digite seu e-mail" required>
        <input type="password" id="senha" placeholder="Digite sua senha" required>
        <button onclick="fazerLogin()">Entrar</button>
        <div class="links">
            <a href="#">Esqueci minha senha</a> | 
            <a href="#">Criar conta</a>
        </div>
    </div>
    <script>
        async function fazerLogin() {
            const email = document.getElementById("email").value;
            const senha = document.getElementById("senha").value;
            
            if(email === "" || senha === "") {
                alert("Preencha todos os campos!");
                return;
            }
            
            try {
                const response = await fetch("http://localhost/api/login", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({ email, senha })
                });
                
                const data = await response.json();
                console.log(data);

                if (response.ok) {
                    alert("Login realizado com sucesso!");
                } else {
                    alert(data.message || "Erro ao realizar login");
                }
            } catch (error) {
                alert("Erro na requisição: " + error.message);
            }
        }
    </script>
</body>
</html>