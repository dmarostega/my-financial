<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Portfólio Técnico — Diogo Marostega</title>
  <style>
    :root{
      --bg:#0f172a; --card:#0b1220; --muted:#9aa4b2; --accent:#10b981; --accent-2:#3b82f6; --bar-bg:#1f2937;
      --max-width:880px;
      font-family:Inter, ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
    }
    body{background:linear-gradient(180deg,#071029 0%, #071020 100%); color:#e6eef6; margin:28px; display:flex; justify-content:center}
    .wrap{width:100%; max-width:var(--max-width)}
    header{display:flex; gap:16px; align-items:center; margin-bottom:18px}
    .avatar{width:68px;height:68px;border-radius:10px;background:linear-gradient(135deg,var(--accent),var(--accent-2));display:flex;align-items:center;justify-content:center;font-weight:700;color:#041024}
    h1{font-size:18px;margin:0}
    p.lead{color:var(--muted);margin:0;font-size:13px}
    .card{background:linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01)); padding:18px;border-radius:12px; box-shadow: 0 6px 18px rgba(2,6,23,0.6);}
    table{width:100%; border-collapse:collapse; margin-top:10px}
    thead th{ text-align:left; font-size:12px; color:var(--muted); padding-bottom:8px}
    tbody tr{border-top:1px solid rgba(255,255,255,0.03)}
    td{padding:12px 0; vertical-align:middle}
    .tech{width:36%; font-weight:600}
    .duration{width:18%; color:var(--muted); font-size:13px}
    .barcell{width:46%}
    .bar{background:var(--bar-bg);height:18px;border-radius:10px;overflow:hidden;position:relative}
    .bar > i{position:absolute; left:0; top:0; bottom:0; border-radius:10px}
    .bar .php{background:linear-gradient(90deg,var(--accent), #05a081);}
    .bar .laravel{background:linear-gradient(90deg,var(--accent-2), #7c3aed)}
    .bar .mysql{background:linear-gradient(90deg,#f59e0b,#f97316)}
    .bar .js{background:linear-gradient(90deg,#f97316,#ef4444)}
    .bar .api{background:linear-gradient(90deg,#06b6d4,#0ea5a2)}
    .bar .git{background:linear-gradient(90deg,#f43f5e,#ef4444)}
    .bar .csharp{background:linear-gradient(90deg,#3b82f6,#06b6d4)}
    .bar .java{background:linear-gradient(90deg,#6366f1,#a78bfa)}
    .label{position:absolute; right:10px; top:50%; transform:translateY(-50%); font-size:12px; color:#021224; font-weight:700}
    .note{font-size:13px;color:var(--muted); margin-top:12px}
    /* responsive */
    @media (max-width:720px){
      .tech{width:40%}
      .duration{display:none}
      .label{right:8px;font-size:11px}
    }
  </style>
</head>
<body>
  <div class="wrap">
    <header>
      <div class="avatar">DM</div>
      <div>
        <h1>Portfólio Técnico — Diogo Marostega</h1>
        <p class="lead">Visualização proporcional da experiência por stack (valores aproximados conforme histórico profissional).</p>
      </div>
    </header>

    <section class="card" aria-label="Tabela de experiência por tecnologia">
      <table>
        <thead>
          <tr>
            <th>Tecnologia</th>
            <th>Tempo (aprox.)</th>
            <th>Intensidade</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="tech">PHP</td>
            <td class="duration">8 anos e 3 meses</td>
            <td class="barcell">
              <div class="bar" aria-hidden>
                <i class="php" style="width:100%"></i>
                <span class="label">100%</span>
              </div>
            </td>
          </tr>

          <tr>
            <td class="tech">Laravel</td>
            <td class="duration">5 anos e 10 meses</td>
            <td class="barcell">
              <div class="bar">
                <i class="laravel" style="width:71%"></i>
                <span class="label">71%</span>
              </div>
            </td>
          </tr>

          <tr>
            <td class="tech">Blade (Laravel)</td>
            <td class="duration">5 anos e 10 meses</td>
            <td class="barcell">
              <div class="bar">
                <i class="laravel" style="width:71%"></i>
                <span class="label">71%</span>
              </div>
            </td>
          </tr>

          <tr>
            <td class="tech">MySQL</td>
            <td class="duration">8 anos e 3 meses</td>
            <td class="barcell">
              <div class="bar">
                <i class="mysql" style="width:100%"></i>
                <span class="label">100%</span>
              </div>
            </td>
          </tr>

          <tr>
            <td class="tech">JavaScript / jQuery / CSS / Ajax</td>
            <td class="duration">8 anos e 3 meses</td>
            <td class="barcell">
              <div class="bar">
                <i class="js" style="width:100%"></i>
                <span class="label">100%</span>
              </div>
            </td>
          </tr>

          <tr>
            <td class="tech">APIs RESTful</td>
            <td class="duration">2 anos</td>
            <td class="barcell">
              <div class="bar">
                <i class="api" style="width:24%"></i>
                <span class="label">24%</span>
              </div>
            </td>
          </tr>

          <tr>
            <td class="tech">Git (controle de versão)</td>
            <td class="duration">5 anos e 10 meses</td>
            <td class="barcell">
              <div class="bar">
                <i class="git" style="width:71%"></i>
                <span class="label">71%</span>
              </div>
            </td>
          </tr>

          <tr>
            <td class="tech">C#</td>
            <td class="duration">9 meses</td>
            <td class="barcell">
              <div class="bar">
                <i class="csharp" style="width:9%"></i>
                <span class="label">9%</span>
              </div>
            </td>
          </tr>

          <tr>
            <td class="tech">Java (JSF)</td>
            <td class="duration">3 meses</td>
            <td class="barcell">
              <div class="bar">
                <i class="java" style="width:3%"></i>
                <span class="label">3%</span>
              </div>
            </td>
          </tr>

        </tbody>
      </table>

      <p class="note">Observação: as porcentagens são proporcionais ao seu maior período (PHP = 100%) e representam uma visão aproximada da experiência prática ao longo da carreira. Ajustes finos podem ser feitos caso queira valores diferentes.</p>
    </section>

  </div>
</body>
</html>
