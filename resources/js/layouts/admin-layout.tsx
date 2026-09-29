import type { ReactNode } from 'react';
import AppSidebarLayout from '@/layouts/app/app-sidebar-layout';
import { TooltipProvider } from '@/components/ui/tooltip';
import type { BreadcrumbItem } from '@/types';

interface AdminLayoutProps {
    children: ReactNode;
    breadcrumbs?: BreadcrumbItem[];
}

export default ({ children, breadcrumbs, ...props }: AdminLayoutProps) => (
    <TooltipProvider delayDuration={0}>
        <AppSidebarLayout breadcrumbs={breadcrumbs} {...props}>
            {children}
        </AppSidebarLayout>
    </TooltipProvider>
);
