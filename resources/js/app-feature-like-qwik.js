// Original fetch method
const originalFetch = window.fetch;

// Override the global fetch method
window.fetch = async (url, options) => {
    // Add cache headers to options
    if (
        (!options?.method || options?.method === "GET") &&
        (!options || !options.cache)
    ) {
        options = {
            ...options,
            headers: {
                ...options?.headers,
                "Cache-Control": "max-age=30", // Cache for 30 seconds
            },
        };
    }

    return originalFetch(url, options);
};

// Prefetch a page when a link is hovered
function prefetchPage(el) {
    const href = el.getAttribute("href");
    const link = document.createElement("link");
    link.setAttribute("rel", "prefetch");
    link.setAttribute("href", href);

    document.head.appendChild(link);
}

document.querySelectorAll("a").forEach((el) => {
    el.addEventListener("mouseenter", () => {
        prefetchPage(el);
    });
});

// Load and run scripts dynamically
async function loadAndRunScript(scriptFileName, dataId) {
    try {
        const scriptResponse = await fetch(scriptFileName);

        if (scriptResponse.ok) {
            const scriptContent = await scriptResponse.text();
            runScript(scriptContent, dataId);
        } else {
            throw new Error(
                `Failed to fetch script: ${scriptResponse.statusText}`
            );
        }
    } catch (error) {
        console.error("Error loading script:", error);
    }
}

// Run the script content
function runScript(scriptContent, dataId) {
    // Check if a script with the same data-id is already in the DOM
    const existingScript = document.head.querySelector(
        `script[data-id="${dataId}"]`
    );

    // If it doesn't exist, create and append the script
    if (!existingScript) {
        const script = document.createElement("script");
        script.setAttribute("data-id", dataId);
        script.innerHTML = scriptContent;
        document.head.appendChild(script);
    }
}

// Handle intersection observer events
function handleIntersection(entries, observer) {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            document.querySelectorAll("*").forEach((element) => {
                const attributes = element.attributes;
                for (let i = 0; i < attributes.length; i++) {
                    const attributeName = attributes[i].name;
                    const attributeValue = attributes[i].value;

                    if (attributeName.startsWith("on:")) {
                        const [scriptFileName, scriptType] =
                            attributeValue.split(".");
                        const dataId = scriptFileName;

                        // Load and run the script dynamically
                        loadAndRunScript(
                            scriptFileName + "." + scriptType,
                            dataId
                        );

                        window.addEventListener("popstate", () => {
                            handleIntersection(entries, observer);
                        });

                        observer.unobserve(entry.target);
                    }
                }
            });
        }
    });
}

// Create intersection observer
const intersectionObserver = new IntersectionObserver(handleIntersection, {
    threshold: 0.5, // Adjust the threshold as needed
});

// Add event listeners to elements based on their attributes
document.querySelectorAll("*").forEach((element) => {
    const attributes = element.attributes;
    for (let i = 0; i < attributes.length; i++) {
        const attributeName = attributes[i].name;
        const attributeValue = attributes[i].value;

        if (attributeName.startsWith("on:")) {
            const eventType = attributeName.substring(3);
            const [scriptFileName, scriptType] = attributeValue.split(".");
            const dataId = scriptFileName;

            if (eventType !== "visible") {
                element.addEventListener(eventType, () => {
                    // Load and run the script dynamically
                    loadAndRunScript(scriptFileName + "." + scriptType, dataId);
                });
            } else {
                // Observe the element for intersection
                intersectionObserver.observe(element);
            }
        }
    }
});
