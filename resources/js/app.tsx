import { createInertiaApp } from '@inertiajs/react';
import { lazy } from 'react';
import { initializeTheme } from '@/hooks/use-appearance';
import TrackingLayout from '@/layouts/tracking-layout';

const AuthLayout = lazy(() => import('@/layouts/auth-layout'));

const appName = import.meta.env.VITE_APP_NAME || 'PBM Landing Page';

createInertiaApp({
    title: (title) => (title ? `${title}` : appName),
    layout: (name) => {
        switch (true) {
            case name.startsWith('auth/'):
                return [TrackingLayout, AuthLayout];
            default:
                return TrackingLayout;
        }
    },
    progress: {
        color: '#D70808',
    },
});

initializeTheme();
