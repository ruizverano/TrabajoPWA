const logError = (error, message) => {
    console.error(`${message}:`, error);
};

const getNotificationOptions = (data) => {
    const defaultOptions = {
        body: '',
        icon: new URL('notification-icon.png', import.meta.url).href
    };
    return { ...defaultOptions, ...data };
};

const handleInstall = (event) => {
    try {
        console.log('Service Worker instalado');
        
    } catch (error) {
        logError(error, 'Error during installation');
    }
};

const handleActivate = (event) => {
    try {
        console.log('Service Worker activado');
        
    } catch (error) {
        logError(error, 'Error during activation');
    }
};

const handlePush = (event) => {
    try {
        console.log('Notificación push recibida');
        const data = event.data.json();
        if (!data || !data.title || !data.body) {
            logError(new Error('Invalid push data'), 'Error during push event');
            return;
        }
        const notificationOptions = getNotificationOptions(data);
        self.registration.showNotification(data.title, notificationOptions);
    } catch (error) {
        logError(error, 'Error during push event');
    }
};

self.addEventListener('install', handleInstall);
self.addEventListener('activate', handleActivate);
self.addEventListener('push', handlePush);