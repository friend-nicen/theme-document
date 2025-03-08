/*
 * 友情链接关系图表
 * @author 友人a丶
 * @date 2024-01-18
 */

$(function () {

    /* 创建关系图表容器 */
    const container = document.getElementById('friend-graph');
    if (!container) return;

    /* 从DOM中获取友情链接数据 */
    const currentSiteEl = container.querySelector('.current-site');
    const friendLinkEls = container.querySelectorAll('.friend-link');

    /* 创建当前站点节点 */
    const currentSite = {
        name: currentSiteEl.dataset.name || '当前站点',
        image: currentSiteEl.dataset.image || '',
        description: currentSiteEl.dataset.description || ''
    };

    /* 从DOM元素创建友情链接数据 */
    const links = Array.from(friendLinkEls).map(el => ({
        name: el.dataset.name || '',
        image: el.dataset.image || '',
        description: el.dataset.description || ''
    }));

    /* 创建节点和边（包括当前站点节点） */
    const nodes = [{
        id: 0,
        label: currentSite.name,
        image: currentSite.image,
        description: currentSite.description,
        x: (container.clientWidth - 100) / 2,
        y: (container.clientHeight - 100) / 2
    }].concat(links.map((link, index) => ({
        id: index + 1,
        label: link.name,
        image: link.image || '',
        description: link.description || '',
        x: Math.random() * (container.clientWidth - 100) + 50,
        y: Math.random() * (container.clientHeight - 100) + 50
    })));

    /* 创建边（将所有节点连接到中心节点） */
    const edges = nodes.map((node, index) => ({
        from: 0,
        to: index
    })).filter(edge => edge.from !== edge.to);

    /* 绘制节点 */
    function drawNodes() {

        nodes.forEach(node => {

            const nodeEl = document.createElement('div');
            nodeEl.className = 'friend-node';
            nodeEl.style.left = `${node.x}px`;
            nodeEl.style.top = `${node.y}px`;

            /* 节点内容 */
            nodeEl.innerHTML = `
                <div class="node-icon">
                    <img src="${node.image}" alt="${node.label}" onerror="this.src='${window.themeUrl}/assets/images/default.png'">
                </div>
                <div class="node-info">
                    <h3>${node.label}</h3>
                    <p>${node.description}</p>
                </div>
            `;


            /* 添加拖拽功能 */
            let isDragging = false;
            let currentX;
            let currentY;

            nodeEl.addEventListener('mousedown', function (e) {
                isDragging = true;
                currentX = e.clientX - node.x;
                currentY = e.clientY - node.y;
                nodeEl.classList.add('dragging');
            });

            document.addEventListener('mousemove', function (e) {

                if (!isDragging) return;

                node.x = e.clientX - currentX;
                node.y = e.clientY - currentY;
                nodeEl.style.left = `${node.x}px`;
                nodeEl.style.top = `${node.y}px`;


                drawEdges(); // 重新绘制连线
            });

            document.addEventListener('mouseup', function () {
                isDragging = false;
                nodeEl.classList.remove('dragging');
            });

            container.appendChild(nodeEl);
        });
    }

    /* 绘制边（连线） */
    function drawEdges() {

        const svg = document.getElementById('friend-edges');
        if (!svg) return;

        /* 清除现有的线 */
        svg.innerHTML = '';

        /* 绘制新的连线 */
        edges.forEach(edge => {
            const from = nodes[edge.from];
            const to = nodes[edge.to];

            const line = document.createElementNS('http://www.w3.org/2000/svg', 'line');
            line.setAttribute('x1', from.x + 40); // 节点中心点
            line.setAttribute('y1', from.y + 40);
            line.setAttribute('x2', to.x + 40);
            line.setAttribute('y2', to.y + 40);
            line.setAttribute('class', 'friend-edge');

            svg.appendChild(line);
        });
    }

    /* 初始化图表 */
    function initGraph() {

        /* 创建SVG容器用于绘制边 */
        const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
        svg.id = 'friend-edges';
        svg.style.width = '100%';
        svg.style.height = '100%';
        container.appendChild(svg);

        drawNodes();
        drawEdges();
    }

    initGraph();
});