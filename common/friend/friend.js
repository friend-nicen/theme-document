/*
 * 友情链接关系图表
 * @author 友人a丶
 * @date 2024-01-18
 */

$(function () {

    let gap = window.innerWidth < 767 ? 2 : 4;

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
    const nodes = [];
    const minDistance = 100; // 最小节点间距
    const padding = 50; // 容器边距

    /* 检查新位置是否与现有节点重叠 */
    function isValidPosition(x, y, existingNodes) {
        for (const node of existingNodes) {
            const distance = Math.sqrt(
                Math.pow(x - node.x, 2) +
                Math.pow(y - node.y, 2)
            );
            if (distance < minDistance) return false;
        }
        return true;
    }

    /* 获取随机有效位置 */
    function getValidPosition(existingNodes) {
        let x, y;
        let attempts = 0;
        const maxAttempts = 100;
        const minBorderDistance = (container.clientWidth > 720 ? 150 : 70); // 与边界的最小距离

        do {
            // 考虑边界距离计算随机位置
            x = Math.random() * (container.clientWidth - 2 * minBorderDistance) + minBorderDistance;
            y = Math.random() * (container.clientHeight - 2 * minBorderDistance) + minBorderDistance;
            attempts++;
        } while (!isValidPosition(x, y, existingNodes) && attempts < maxAttempts);

        return {x, y};
    }

    /* 添加中心节点 */
    nodes.push({
        id: 0,
        label: currentSite.name,
        image: currentSite.image,
        description: currentSite.description,
        x: container.clientWidth / 2 - (gap / 2 * rem),
        y: (container.clientHeight - 120) / 2
    });

    /* 添加友情链接节点 */
    links.forEach((link, index) => {
        const position = getValidPosition(nodes);
        nodes.push({
            id: index + 1,
            label: link.name,
            image: link.image || '',
            description: link.description || '',
            x: position.x,
            y: position.y
        });
    });

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
                    <img src="${node.image}" alt="${node.label}">
                </div>
                <div class="node-info">
                    <h3>${node.label}</h3>
                    <p>${node.description}</p>
                </div>
            `;


            /* 添加拖拽和点击功能 */
            let isDragging = false;
            let currentX;
            let currentY;
            let startX;
            let startY;

            nodeEl.addEventListener('mousedown', function (e) {
                isDragging = false;
                startX = e.clientX;
                startY = e.clientY;
                currentX = e.clientX - node.x;
                currentY = e.clientY - node.y;
                nodeEl.classList.add('dragging');
            });

            document.addEventListener('mousemove', function (e) {

                if (!nodeEl.classList.contains('dragging')) return;

                const moveDistance = Math.sqrt(
                    Math.pow(e.clientX - startX, 2) +
                    Math.pow(e.clientY - startY, 2)
                );

                if (moveDistance > 5) {
                    isDragging = true;
                }

                node.x = e.clientX - currentX;
                node.y = e.clientY - currentY;
                nodeEl.style.left = `${node.x}px`;
                nodeEl.style.top = `${node.y}px`;

                drawEdges(); // 重新绘制连线
            });

            nodeEl.addEventListener('mouseup', function () {
                if (!isDragging && node.id !== 0) {
                    const url = friendLinkEls[node.id - 1].dataset.url;
                    if (url) {
                        window.open(url, '_blank');
                    }
                }
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
        const length = gap * rem / 2;




        /* 绘制新的连线 */
        edges.forEach(edge => {
            const from = nodes[edge.from];
            const to = nodes[edge.to];


            const line = document.createElementNS('http://www.w3.org/2000/svg', 'line');
            line.setAttribute('x1', from.x + length); // 节点中心点
            line.setAttribute('y1', from.y + length);
            line.setAttribute('x2', to.x + length);
            line.setAttribute('y2', to.y + length);
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